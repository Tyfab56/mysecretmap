<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftCard extends Model
{
    use HasFactory;

    // Spécifier le nom de la table si différent du nom du modèle au pluriel
    protected $table = 'gift_cards';

    // Désactiver les timestamps si votre table ne contient pas les champs created_at et updated_at
    public $timestamps = false;

    // Définir les champs qui peuvent être assignés massivement
    protected $fillable = ['idbon', 'used'];

    // Casts personnalisés pour les types de champs (optionnel)
    protected $casts = [
        'used' => 'boolean',
    ];
}