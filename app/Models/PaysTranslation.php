<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaysTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['libelle'];
}
