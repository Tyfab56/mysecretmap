<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioguideSpot extends Model
{
    use HasFactory;

    protected $table = 'audioguide_spots'; // Nom de la table

    protected $fillable = ['spot_id', 'language_code']; // Champs remplissables

    // Relation avec le modèle Spot
    public function spot()
    {
        return $this->belongsTo(Spots::class);
    }
}