<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    /**
     * La table associée au modèle.
     *
     * @var string
     */
    protected $table = 'newsletter';

    /**
     * Les champs qui peuvent être remplis en masse.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',       // ID de l'utilisateur (nullable)
        'email',         // Adresse email
        'subscribed',    // Statut d'abonnement (true/false)
        'created_at',    // Date de création
        'updated_at',    // Date de mise à jour
    ];

    /**
     * Relation avec le modèle `User`.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
