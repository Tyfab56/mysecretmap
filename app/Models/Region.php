<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'pays_id', 'image_path'];

    public function pays()
    {
        return $this->belongsTo(Pays::class, 'pays_id', 'pays_id');
    }

    public function spots()
    {
        return $this->hasMany(Spots::class);
    }
}
