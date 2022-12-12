<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class Spots extends Model implements TranslatableContract
{
    use Translatable;


    public $translatedAttributes = [
        'description', 'accessibilite', 'chemin', 'drone', 'lumiere', 'secretspot'
    ];
    protected $fillable = [
        'name',
        'pays',
        'lat',
        'lng',
        'fichier',
        'fichiersquare',
        'fichierregion',
        'userid',
        'stockage',
        'imgpanosmall',
        'imgpanomedium',
        'imgpanolarge',
        'actif',
        'imgsquaresmall',
        'imgsquaremedium',
        'imgsquarelarge',
        'imgvueregionmedium',
        'imgvueregionlarge',
        'randotime',
        'typepoint_id'

    ];

    public function pays()
    {
        return $this->belongsTo(Pays::class, 'pays_id', 'pays_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid', 'id');
    }
}
