<?php
namespace App\Jobs;

use FFMpeg;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\Format\Video\X264;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use App\Models\ShareMedia;

class ProcessVideoForPreview implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $temporaryPath;
    protected $requestData;

    public function __construct($temporaryPath, $requestData)
    {
        $this->temporaryPath = $temporaryPath;
        $this->requestData = $requestData;
    }

    public function handle()
    {
        $diskLocal = Storage::disk('local');
        $diskS3 = Storage::disk('wasabi');
    
        $localVideoPath = $diskLocal->path($this->temporaryPath);
        $filename = basename($this->temporaryPath);
    
        // Préparation du répertoire pour les vignettes
        $thumbnailDir = storage_path('app/public/thumbnails');
        if (!file_exists($thumbnailDir)) {
            mkdir($thumbnailDir, 0755, true);
        }
    
        // Chemin absolu de la vignette
        $thumbnailPath = $thumbnailDir . '/' . pathinfo($this->temporaryPath, PATHINFO_FILENAME) . '.jpg';
    
        // Utiliser FFmpeg pour ouvrir la vidéo et générer la vignette
        $ffmpeg = FFMpeg\FFMpeg::create();
        $video = $ffmpeg->open($localVideoPath);


        // Obtenir les dimensions de la vidéo
        $ffprobe = FFMpeg\FFProbe::create();
        $dimension = $ffprobe->streams($localVideoPath)->videos()->first()->getDimensions();
        $width = $dimension->getWidth();
        $height = $dimension->getHeight();


        $video->frame(TimeCode::fromSeconds(1))->save($thumbnailPath);
    
        // Téléchargement de la vignette sur S3
        $diskS3->put('videos/thumbnails/' . basename($thumbnailPath), fopen($thumbnailPath, 'r+'),'public');
    
        // Préparation du répertoire pour les aperçus
        $previewDir = storage_path('app/public/previews');
        if (!file_exists($previewDir)) {
            mkdir($previewDir, 0755, true);
        }
    
        // Chemin absolu pour l'aperçu
        $previewPath = $previewDir . '/' . pathinfo($this->temporaryPath, PATHINFO_FILENAME) . '_preview.mp4';
    
        // Générer une version réduite pour prévisualisation et la télécharger sur S3
        $format = new X264('aac', 'libx264');
        $format->setKiloBitrate(500);
        $video->save($format, $previewPath);
        $diskS3->put('videos/previews/' . basename($previewPath), fopen($previewPath, 'r+'),'public');
    
        // Télécharger le fichier vidéo original sur S3
        $diskS3->put('videos/original/'.$filename, fopen($localVideoPath, 'r+'),'public');
     

        // Sauvegarde des informations dans la base de données
        ShareMedia::create([
            'folder_id' => $this->requestData['folder_id'],
            'title' => $this->requestData['title'],
            'media_link' => $diskS3->url('videos/original/'.$filename),
            'thumbnail_link' => $diskS3->url('videos/thumbnails/' . basename($thumbnailPath)),
            'preview_link' => $diskS3->url('videos/previews/' . basename($previewPath)),
            'media_type' => $this->requestData['media_type'],
            'width' => $width,  // Largeur de la vidéo
            'height' => $height, // Hauteur de la vidéo
        ]);
    
        // Suppression des fichiers temporaires locaux
        @unlink($localVideoPath);
        @unlink($thumbnailPath);
        @unlink($previewPath);
    }
}
