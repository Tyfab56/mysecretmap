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
        'description', 'accessibilite', 'chemin', 'drone', 'lumiere', 'secretspot','video1','blog'
    ];
    protected $fillable = [
        'name',
        'pays_id',
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
        'maps_id',
        'imgsquaresmall',
        'imgsquaremedium',
        'imgsquarelarge',
        'imgvueregionmedium',
        'imgvueregionlarge',
        'randotime',
        'typepoint_id',
        'latparking',
        'lngparking',
        'parkingpayant',
        'audioguide',

    ];

    public function pays()
    {
        return $this->belongsTo(Pays::class, 'pays_id', 'pays_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid', 'id');
    }

    public function map()
    {
        return $this->belongsTo(Maps::class, 'maps_id', 'id');
    }


}
