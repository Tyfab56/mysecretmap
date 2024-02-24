<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class RandoSpot extends Model
{
    use Translatable;

    public $translatedAttributes = ['nom,description,video_link'];
    protected $table = 'randos_spots';
    // Définissez ici d'autres propriétés et méthodes selon votre besoin

    public function spot()
{
    return $this->belongsTo(Spots::class, 'spot_id');
}

}
