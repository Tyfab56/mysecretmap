<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnecdoteCat extends Model
{
    use HasFactory, Translatable;

    protected $table = 'anecdotecats';

    public $translatedAttributes = ['name'];  // Spécifie les champs traduits

    protected $fillable = [
        // Ajoutez ici les champs spécifiques à votre modèle de catégorie
    ];

    // Les traductions liées à la catégorie
    public function translations()
    {
        return $this->hasMany(AnecdoteCatTranslation::class, 'anecdotecat_id');
    }
}
