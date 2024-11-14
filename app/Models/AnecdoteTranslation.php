<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnecdoteTranslation extends Model
{
    use HasFactory, Translatable;

    protected $table = 'anecdote_translations';

    public $translatedAttributes = ['text'];  // Spécifie les champs traduits

    protected $fillable = [
        'anecdote_id',
        'id_lang',
        'titre',
        'text'
    ];

    // Relation avec l'anecdote
    public function anecdote()
    {
        return $this->belongsTo(Anecdote::class, 'anecdote_id');
    }

    // Relation avec la langue
    public function lang()
    {
        return $this->belongsTo(Langs::class, 'id_lang', 'idlang');
    }
}
