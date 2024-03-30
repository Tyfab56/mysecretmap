<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMediaPurchase extends Model
{
    protected $fillable = ['user_id', 'media_id', 'purchased_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function media()
    {
        return $this->belongsTo(ShareMedia::class, 'media_id');
    }
}
