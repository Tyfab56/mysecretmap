<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circuits_details extends Model
{
    use HasFactory;

    protected $fillable = [
        'circuit_id',
        'rang',
        'spot_id'
    ];

    public function Circuit()
    {
        return $this->belongsTo(Circuits::class, 'circuit_id', 'id');
    }

    public function Spot()
    {
        return $this->belongsTo(Spots::class, 'spot_id', 'id');
    }
}
