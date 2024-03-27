<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\ShareMedia;

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
        $diskS3 = Storage::disk('s3');

        $localImagePath = $diskLocal->path($this->temporaryPath);
        $filename = basename($this->temporaryPath);

        // Redimensionner l'image ou appliquer des filtres si nécessaire
        $image = Image::make($localImagePath)->resize(1280, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize(); // Éviter l'agrandissement
        });

        // Sauvegarde temporaire de l'image traitée localement
        $processedImagePath = $localImagePath . '_processed.jpg';
        $image->save($processedImagePath);

        // Télécharger l'image traitée sur S3
        $imagePathOnS3 = 'images/'.$filename;
        $diskS3->put($imagePathOnS3, fopen($processedImagePath, 'r+'));

        // Sauvegarde des informations dans la base de données
        ShareMedia::create([
            'folder_id' => $this->requestData['folder_id'],
            'title' => $this->requestData['title'],
            'media_link' => $diskS3->url($imagePathOnS3),
            'media_type' => $this->requestData['media_type'],
            // Autres champs au besoin...
        ]);

        // Suppression des fichiers temporaires locaux
        unlink($localImagePath);
        unlink($processedImagePath);
    }
}
