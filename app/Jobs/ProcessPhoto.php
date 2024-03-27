<?php
namespace App\Jobs;

use App\Models\ShareMedia;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProcessPhoto implements ShouldQueue
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

        $localImagePath = $diskLocal->path($this->temporaryPath);
        $filename = basename($this->temporaryPath);

        // Télécharger l'image originale sur S3
        $originalImagePathOnS3 = 'images/original/'.$filename;
        $diskS3->put($originalImagePathOnS3, fopen($localImagePath, 'r+'));

        // Créer et sauvegarder la vignette
        $image = Image::make($localImagePath)->resize(600, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize(); // Éviter l'agrandissement
        });

        // Nom de fichier pour la vignette
        $thumbnailFilename = pathinfo($filename, PATHINFO_FILENAME) . '_thumbnail.jpg';
        $thumbnailPathOnS3 = 'images/thumbnails/' . $thumbnailFilename;
        
        // Sauvegarde temporaire de l'image traitée localement pour le téléchargement
        $processedImagePath = sys_get_temp_dir() . '/' . $thumbnailFilename;
        $image->save($processedImagePath);

        // Télécharger la vignette sur S3
        $diskS3->put($thumbnailPathOnS3, fopen($processedImagePath, 'r+'));

        // Sauvegarde des informations dans la base de données
        ShareMedia::create([
            'folder_id' => $this->requestData['folder_id'],
            'title' => $this->requestData['title'],
            'media_link' => $diskS3->url($originalImagePathOnS3), // URL de l'image originale sur S3
            'thumbnail_link' => $diskS3->url($thumbnailPathOnS3), // URL de la vignette sur S3
            'media_type' => $this->requestData['media_type'],
        ]);

        // Suppression des fichiers temporaires locaux
        unlink($localImagePath); // Supprime le fichier image original temporaire local
        unlink($processedImagePath); // Supprime le fichier vignette temporaire local
    }
}
