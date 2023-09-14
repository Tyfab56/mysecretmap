<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Whoiam extends Model
{
    use Translatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code'];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatedAttributes = ['name', 'description'];

    /**
     * Get the user that owns the WhoIAm.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship for the translation model.
     */
    public function translations()
    {
        return $this->hasMany(WhoIAmTranslation::class);
    }
}

