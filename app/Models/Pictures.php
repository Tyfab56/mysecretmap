<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pictures extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'spot_id',
        'store',
        'actif',
        'goodies',
        'titre',
        'fichier',
        'fichiersquare',
        'fichierregion',
        'userid',
        'stockage',
        'small',
        'medium',
        'large',
        'pays_id',
        'width',
        'height'


    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function spot()
    {
        return $this->belongsTo(Spots::class);
    }
}
