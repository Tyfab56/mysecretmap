<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SortedSpot extends Model
{
    use HasFactory;

    protected $table = 'sorted_spots';

    protected $fillable = [
        'spot_id',
        'pays_id',
        'region_id',
        'type_id',
        'order',
    ];

    public function spot()
    {
        return $this->belongsTo(Spots::class, 'spot_id', 'id');
    }

    public function pays()
    {
        return $this->belongsTo(Pays::class, 'pays_id', 'id');
    }

    public function typepoint()
    {
        return $this->belongsTo(Typepoint::class, 'type_id', 'id');
    }
}
