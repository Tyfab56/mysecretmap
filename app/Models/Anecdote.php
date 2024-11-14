<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anecdote extends Model
{
    use HasFactory;

    protected $table = 'anecdotes';

    protected $fillable = [
        'pays_id',
        'category_id',
        'image_url'
    ];

    // Les traductions liées à l'anecdote
    public function translations()
    {
        return $this->hasMany(AnecdoteTranslation::class, 'anecdote_id');
    }

    // Relation avec la catégorie
    public function category()
    {
        return $this->belongsTo(AnecdoteCat::class, 'category_id');
    }

    // Relation avec le pays
    public function pays()
    {
        return $this->belongsTo(Pays::class, 'pays_id');
    }
}
