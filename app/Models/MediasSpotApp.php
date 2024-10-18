<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediasSpotApp extends Model
{
    protected $table = 'mediasspotapp';

    protected $fillable = [
        'spot_id',
        'media_type',
        'media_url',
        'media_filename',
        'media_description',
        'media_rank',
        'id_lang',
        'created_at',
        'updated_at',
    ];

    // Relation avec le modèle Spot
    public function spot()
    {
        return $this->belongsTo(Spots::class, 'spot_id');
    }

    // Scope pour les médias d'un type spécifique (photo, vidéo, audio)
    public function scopeOfType($query, $mediaType)
    {
        return $query->where('media_type', $mediaType);
    }
}
