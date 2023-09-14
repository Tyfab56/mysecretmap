<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhoiamTranslation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['whoiam_id', 'locale', 'name', 'description'];

    /**
     * Disable timestamps for translations table.
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Get the whoiam that owns the translation.
     */
    public function whoiam()
    {
        return $this->belongsTo(WhoIAm::class);
    }
}

