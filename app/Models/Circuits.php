<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Circuits extends Model
{
    use HasFactory;


    public function details()
    {
        return $this->hasMany(Circuits_details::class, 'circuit_id', 'id');
    }

    protected $fillable = [
        'user_id',
        'pays_id',
        'titre'
    ];
}
