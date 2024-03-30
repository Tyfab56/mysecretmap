<?php
namespace App\Jobs;

use FFMpeg;
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
        dd($localVideoPath);

        // Utilisez FFmpeg pour ouvrir la vidéo
        $ffmpeg = FFMpeg\FFMpeg::create();
        $video = $ffmpeg->open($localVideoPath);

        // Générer la vignette
        $thumbnailPath = 'thumbnails/' . pathinfo($this->temporaryPath, PATHINFO_FILENAME) . '.jpg';
        $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(1))->save($thumbnailPath);
        $diskS3->put($thumbnailPath, fopen($thumbnailPath, 'r+'));

        // Générer une version réduite pour prévisualisation
        $previewPath = 'previews/' . pathinfo($this->temporaryPath, PATHINFO_FILENAME) . '_preview.mp4';
        $format = new FFMpeg\Format\Video\X264('aac', 'libx264');
        $format->setKiloBitrate(500);
        $video->save($format, $previewPath);
        $diskS3->put($previewPath, fopen($previewPath, 'r+'));

        // Télécharger le fichier vidéo original sur S3
        $diskS3->put('videos/'.$filename, fopen($localVideoPath, 'r+'));

        // Sauvegarde des informations dans la base de données
        ShareMedia::create([
            'folder_id' => $this->requestData['folder_id'],
            'title' => $this->requestData['title'],
            'media_link' => $diskS3->url('videos/'.$filename),
            'thumbnail_path' => $diskS3->url($thumbnailPath),
            'preview_path' => $diskS3->url($previewPath),
            'media_type' => $this->requestData['media_type'],
        ]);

        // Suppression des fichiers temporaires locaux
        unlink($localVideoPath);
        unlink($thumbnailPath);
        unlink($previewPath);
    }
}
