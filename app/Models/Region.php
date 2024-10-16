<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Region extends Model
{
    use HasFactory, Translatable;

    // Define the fields that are translatable
    public $translatedAttributes = ['name'];

    // Fillable fields for mass assignment
    protected $fillable = ['pays_id', 'image_path'];

    // Define relationship with 'Pays' (country)
    public function pays()
    {
        return $this->belongsTo(Pays::class, 'pays_id', 'pays_id');
    }

    // Define relationship with 'Spots'
    public function spots()
    {
        return $this->hasMany(Spots::class);
    }

    // Define relationship with translations (Astrotomic automatically handles the relationship)
    public function translations()
    {
        return $this->hasMany(RegionTranslation::class);
    }
}
