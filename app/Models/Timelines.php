<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Timelines extends Model
{
    use Translatable;


    public $translatedAttributes = [
        'description', 'texte'
    ];

    protected $fillable = [
        'image'

    ];
}
