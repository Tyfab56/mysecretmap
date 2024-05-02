<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpotBannerUser extends Model
{
    protected $table = 'spot_banner_user';

    protected $fillable = [
        'spot_id', 'banner_id', 'user_id'
    ];

    public $timestamps = true;

    // Définition des relations
    public function spot()
    {
        return $this->belongsTo('App\Models\Spotsphp artisan make:controller BannerController --resource'); // Assurez-vous que le modèle Spot existe
    }

    public function banner()
    {
        return $this->belongsTo('App\Models\Banner');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User'); // Assurez-vous que le modèle User existe
    }
}
