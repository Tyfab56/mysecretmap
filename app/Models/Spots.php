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
        'description',
        'accessibilite',
        'chemin',
        'drone',
        'lumiere',
        'secretspot',
        'video1',
        'blog'
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
        'region_id',

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

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'spot_id')->where('actif', 1);
    }

    public function commentsByLang($lang)
    {
        return $this->hasMany(Comment::class)->where('id_lang', $lang)->where('actif', 1);
    }
    public function isInAudioguide($lang)
    {
        return $this->audioguideSpots()->where('language_code', $lang)->exists();
    }
    public function audioguideSpots()
    {
        return $this->hasMany(AudioguideSpot::class, 'spot_id', 'id');
    }
    public function media()
    {
        return $this->hasMany(MediaSpotApp::class)->orderBy('media_rank');
    }
}
