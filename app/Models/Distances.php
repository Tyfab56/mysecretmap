<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distances extends Model
{
    use HasFactory;

    protected $table = 'distances'; // Si le nom de votre table est "distances"

    protected $fillable = [
        'spot_origine',
        'spot_destination',
        'metres',
        'temps',
        'geometry',
    ];
    public function spotDestination()
    {
        return $this->belongsTo(Spots::class, 'spot_destination');
    }

    public function spotOrigine()
    {
        return $this->belongsTo(Spots::class, 'spot_origine');
    }

    public static function getDistanceBetweenSpots($originSpotId, $destinationSpotId)
    {
        return self::where('spot_origine', $originSpotId)
            ->where('spot_destination', $destinationSpotId)
            ->first(['metres', 'temps']);
    }
}
