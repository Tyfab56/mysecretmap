<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use League\Csv\Reader;
use App\Models\AudioguideSpot;

class ImportAudioguides extends Command
{
    // Nom de la commande dans artisan
    protected $signature = 'import:audioguides {file}';

    // Description de la commande
    protected $description = 'Import audioguide spots from CSV file';

    // Fonction qui sera exécutée lorsque la commande est appelée
    public function handle()
    {
        // Récupérer le fichier en paramètre
        $file = $this->argument('file');

        // Lire le fichier CSV
        $csv = Reader::createFromPath($file, 'r');
        $csv->setHeaderOffset(0); // Première ligne comme header

        // Boucle sur chaque enregistrement du fichier CSV
        foreach ($csv as $record) {
            AudioguideSpot::create([
                'name' => $record['object_name'],
                'description' => $record['object_description'],
                'contents' => $record['contents'],
                'lat' => $record['latitude'],
                'lng' => $record['longitude'],
                'audio_file' => $record['audio_file'],
                'language_code' => 'fr', 
            ]);
        }

        // Message de confirmation
        $this->info('Importation terminée.');
    }
}
