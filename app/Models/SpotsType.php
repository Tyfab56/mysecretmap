<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class SpotsType extends Model implements TranslatableContract
{
    use Translatable;


    public $translatedAttributes = [
        'description', 'accessibilite', 'chemin', 'drone', 'lumiere', 'secretspot'
    ];
}
