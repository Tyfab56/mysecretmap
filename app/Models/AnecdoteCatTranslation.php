<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnecdoteCatTranslation extends Model
{
    use HasFactory, Translatable;

    protected $table = 'anecdotecat_translations';

    public $translatedAttributes = ['name'];  // Spécifie les champs traduits

    protected $fillable = [
        'anecdotecat_id',
        'id_lang',
        'name'
    ];

    // Relation avec la catégorie d'anecdote
    public function anecdotecat()
    {
        return $this->belongsTo(AnecdoteCat::class, 'anecdotecat_id');
    }

    // Relation avec la langue
    public function lang()
    {
        return $this->belongsTo(Langs::class, 'id_lang', 'idlang');
    }
}
