<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Définir les champs qui peuvent être assignés en masse
    protected $fillable = [
        'spot_id',
        'user_id',
        'pays_id',
        'comment',
        'actif',
        'id_lang',
    ];

    // Définir les relations avec les autres modèles
    public function spot()
    {
        return $this->belongsTo(Spots::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pays()
    {
        return $this->belongsTo(Pays::class, 'pays_id', 'pays_id');
    }
    public function lang()
    {
        return $this->belongsTo(Langs::class, 'id_lang', 'idlang');
    }
}
