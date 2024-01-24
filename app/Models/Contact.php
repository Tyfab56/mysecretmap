<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = ['nom', 'prenom', 'email', 'texte'];

    // Vous pouvez définir d'autres propriétés, relations et méthodes ici si nécessaire

}
