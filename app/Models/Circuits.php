<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Circuits extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = [
        'titre',
        'description'
    ];

    public function details()
    {
        return $this->hasMany(Circuits_details::class, 'circuit_id', 'id');
    }

    protected $fillable = [
        'user_id',
        'pays_id',
        'titre'
    ];
}
