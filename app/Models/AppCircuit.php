<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppCircuit extends Model
{
    use HasFactory;

    // Table associée à ce modèle
    protected $table = 'appcircuits';

    // Définition des champs qui peuvent être assignés massivement
    protected $fillable = [
        'days', // Nombre de jours du circuit
        'pays_id', // ID du pays (clé étrangère vers la table pays)
    ];

    // Relation avec la table `appcircuits_translation`
    public function translations()
    {
        return $this->hasMany(AppCircuitTranslation::class, 'circuit_id');
    }

    // Relation avec la table `pays` (table des pays)
    public function pays()
    {
        return $this->belongsTo(Pays::class, 'pays_id');
    }
}
