<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circuits_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'circuit_id',
        'rang',
        'spot_id'
    ];
}
