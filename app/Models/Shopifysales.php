<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopifysales extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'email',
        'price',
        'currency',
        'status',
        'created_at',
        'idproduit',
        'installation',
        'activation'
    ];
}
