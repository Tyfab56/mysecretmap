<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaSpotApp extends Model

{

    // Table associée
    protected $table = 'mediasspotapp';

    protected $fillable = [
        'spot_id',
        'media_type',
        'media_url',
        'media_description',
        'media_rank'
    ];

    public function spot()
    {
        return $this->belongsTo(Spots::class);
    }
}
