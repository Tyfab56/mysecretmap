<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Folder extends Model
{
    use HasFactory;
    protected $fillable = ['name','country_id','status'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_folders');
    }   

    public function shareMedias()
    {
        return $this->hasMany(ShareMedia::class, 'folder_id');
    }

    public function pays()
    {
        return $this->belongsTo(Pays::class, 'country_id', 'pays_id');
    }

     // Scope pour les dossiers publics
     public function scopePublic($query)
     {
         return $query->where('status', 'public');
     }
 
     // Scope pour les dossiers privés
     public function scopePrivate($query)
     {
         return $query->where('status', 'private');
     }
}
