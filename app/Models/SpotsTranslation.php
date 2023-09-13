<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpotsTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['description', 'accessibilite', 'chemin', 'drone','lumiere','secretspot'];



}
