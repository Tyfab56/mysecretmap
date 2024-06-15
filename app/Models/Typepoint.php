<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typepoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        // autres colonnes
    ];

    public function sortedSpots()
    {
        return $this->hasMany(SortedSpot::class, 'type_id');
    }
}
