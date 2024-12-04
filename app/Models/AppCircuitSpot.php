<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppCircuitSpot extends Model
{
    /**
     * Les champs remplissables.
     *
     * @var array
     */

    protected $table = 'appcircuits_spots';

    protected $fillable = [
        'circuit_id',
        'spot_id',
        'rank',
        'is_in_circuit',
    ];

    /**
     * Les horodatages gérés automatiquement.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Relation avec le modèle `AppCircuit`.
     */
    public function circuit()
    {
        return $this->belongsTo(AppCircuit::class, 'circuit_id');
    }

    /**
     * Relation avec le modèle `Spot`.
     * (Supposons qu'il existe un modèle `Spot` pour gérer les informations des spots.)
     */
    public function spot()
    {
        return $this->belongsTo(Spots::class, 'spot_id');
    }
}
