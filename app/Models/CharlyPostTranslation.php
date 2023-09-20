<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharlyPostTranslation extends Model
{
    use HasFactory;

    protected $table = 'charly_post_translations';

    public $timestamps = false;

    protected $fillable = [
        'charly_post_id',
        'locale',
        'titre',
        'description',
        'video_link'
    ];

    public function charlyPost()
    {
        return $this->belongsTo(CharlyPost::class);
    }
}
