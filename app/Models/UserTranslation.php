<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTranslation extends Model
  
{

    public $timestamps = false;  // Désactivez les timestamps si vous n'en avez pas dans cette table
    protected $table = 'user_translations';
    protected $fillable = ['titre', 'description'];  // Les champs traduisibles

    /**
     * La table associée au modèle.
     *
     * @var string
     */
    
}
