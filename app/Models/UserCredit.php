<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCredit extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'media_type', 'credits'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
