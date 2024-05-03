<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';

    protected $fillable = [
        'title', 'image_url', 'redirect_url', 'active','user_id'
    ];

    public $timestamps = true;

    
    public function users()
    {
        return $this->belongsTo(User::class);
    }

   
}