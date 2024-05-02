<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';

    protected $fillable = [
        'title', 'image_url', 'redirect_url', 'active'
    ];

    public $timestamps = true;

    // Vous pouvez ajouter ici des relations si nécessaire, par exemple avec des spots
}