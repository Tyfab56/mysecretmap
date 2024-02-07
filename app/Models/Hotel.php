<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Hotel extends Model
    {
        // Définition du nom de la table si différent du nom du modèle au pluriel
        protected $table = 'hotels';

        // Définition des colonnes qui peuvent être remplies
        protected $fillable = [
            'name',
            'address',
            'city',
            'postal_code',
            'country_code',
            'latitude',
            'longitude',
            'description',
            'image_url',
            'website_url'
        ];

        // Indique si les timestamps sont utilisés
        public $timestamps = true;

        // Relation avec la table 'pays'

        public function pays()
        {
            return $this->belongsTo(Pays::class, 'country_code', 'pays_id');
        }

        public static function getHotelsNearby($latitude, $longitude, $radius = 50, $limit = 10)
{
        $hotels = self::selectRaw("id, name, address, city, postal_code, country_code, latitude, longitude, description, image_url, website_url, 
            (6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance", [$latitude, $longitude, $latitude])
            ->having("distance", "<", $radius)
            ->orderBy("distance", "ASC")
            ->limit($limit)
            ->get();

        return $hotels;
}
    }