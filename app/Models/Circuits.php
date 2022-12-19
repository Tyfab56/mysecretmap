<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circuits extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pays_id',
        'titre'
    ];
    public function circuits_details()
    {
        return $this->hasMany(Circuits_detail::class);
    }
}
