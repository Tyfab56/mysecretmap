<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Features extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = [
        'titre',
        'bigtitre',
        'subtitre',
        'btntitre'
    ];

    protected $fillable = [
        'fichier',
        'btnlink',
        'imgsmall',
        'imglarge'
    ];
}
