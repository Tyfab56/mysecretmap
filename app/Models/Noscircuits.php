<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noscircuits extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'pays_id',
        'rang'
    ];

    public function circuit()
    {
        return $this->belongsTo(Circuits::class, 'id', 'id');
    }
}
