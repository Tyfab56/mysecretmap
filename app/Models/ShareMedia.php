<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShareMedia extends Model
{
    protected $table = 'sharemedias';

    protected $fillable = [
        'folder_id', 'title', 'media_link', 'thumbnail_link','preview_link','media_type',
        // Ajoutez tous les autres champs que vous souhaitez pouvoir assigner en masse
    ];

    public function folder()
    {
        return $this->belongsTo(Folder::class, 'folder_id');
    }


}

