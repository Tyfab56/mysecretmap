<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuideislParam extends Model
{
    use HasFactory;

    // Table associée
    protected $table = 'guideisl_params';

    // Les champs qui peuvent être remplis en masse
    protected $fillable = [
        'key',   // Clé du paramètre (par exemple: 'map_center')
        'value', // Valeur du paramètre (par exemple: une chaîne JSON)
    ];

    // Casts pour formater certaines colonnes automatiquement
    protected $casts = [
        'value' => 'array', // Si la valeur stockée est au format JSON
    ];

    // Si besoin, ajouter un mutateur pour formater la sortie
    public function getValueAttribute($value)
    {
        // Si le paramètre est JSON (ex: les coordonnées de la carte), on peut le décoder
        $decodedValue = json_decode($value, true);
        return $decodedValue ?? $value; // Si non-JSON, retourne la valeur brute
    }

    // Mutateur pour formater la valeur avant de la stocker
    public function setValueAttribute($value)
    {
        // Si c'est un tableau ou un objet, on peut le convertir en JSON pour le stockage
        if (is_array($value) || is_object($value)) {
            $this->attributes['value'] = json_encode($value);
        } else {
            $this->attributes['value'] = $value;
        }
    }
}
