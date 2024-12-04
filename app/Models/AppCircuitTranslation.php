<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppCircuitTranslation extends Model
{
    /**
     * Les champs remplissables.
     *
     * @var array
     */
    protected $fillable = [
        'circuit_id',
        'locale',
        'title',
        'description',
    ];

    /**
     * Les horodatages gérés automatiquement.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Relation avec le modèle principal `AppCircuit`.
     */
    public function appCircuit()
    {
        return $this->belongsTo(AppCircuit::class, 'circuit_id');
    }
}
