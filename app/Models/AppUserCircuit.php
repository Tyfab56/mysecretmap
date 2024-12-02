<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppUserCircuit extends Model
{
    use HasFactory;

    protected $table = 'app_usercircuits';

    protected $fillable = [
        'user_id',
        'country_code',
        'spot_ids',
        'distance_total',
        'duration_total',
    ];

    protected $casts = [
        'spot_ids' => 'array', // Pour traiter `spot_ids` comme un tableau JSON
    ];

    /**
     * Relation avec le modèle User.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Relation avec le modèle Pays.
     */
    public function country()
    {
        return $this->belongsTo(Pays::class, 'country_code', 'pays_id');
    }

    /**
     * Relation avec les spots (décodage manuel des spots via JSON).
     */
    public function spots()
    {
        $spotIds = $this->spot_ids;

        return Spots::whereIn('id', $spotIds)->get();
    }
}
