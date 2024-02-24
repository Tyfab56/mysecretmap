<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RandoSpotTranslation extends Model
{
    public $timestamps = false; // Pas de timestamps pour la table de traductions
    protected $table = 'randos_spots_translations'; 

    protected $fillable = [
        'nom', 
        'description', 
        'video_link',
    ];

    // Pas besoin de définir des relations ici, elles sont gérées par le modèle principal de RandoSpot
}