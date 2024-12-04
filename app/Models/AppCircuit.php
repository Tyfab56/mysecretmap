<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class AppCircuit extends Model
{
    use Translatable;
    protected $table = 'appcircuits';

    protected $fillable = [
        'pays_id',
        'days',
        'rang',
        'actif',
        'nbspots',
        'created_at',
        'updated_at',
    ];

    public $translatedAttributes = ['name', 'description'];

    /**
     * Indique si les horodatages sont gérés automatiquement.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Relation avec les traductions.
     */
    public function translations()
    {
        return $this->hasMany(AppCircuitTranslation::class);
    }

    /**
     * Relation avec les spots du circuit.
     */
    public function spots()
    {
        return $this->hasMany(AppCircuitSpot::class);
    }
}
