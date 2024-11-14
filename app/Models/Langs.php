<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Langs extends Model
{
    use HasFactory;

    protected $table = 'langs';

    protected $fillable = [
        'idlang',
        'libelle',
        'actif'
    ];
    public function anecdotesTranslations()
    {
        return $this->hasMany(AnecdoteTranslation::class, 'id_lang', 'idlang');
    }

    public function anecdotecatTranslations()
    {
        return $this->hasMany(AnecdoteCatTranslation::class, 'id_lang', 'idlang');
    }
}
