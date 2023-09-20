<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class CharlyPost extends Model
{
    use HasFactory, Translatable;

    protected $table = 'charly_posts';

    protected $fillable = [
        'spot_id',
        'pays_id',
        'rang'
    ];

    public $translatedAttributes = ['titre', 'description', 'video_link'];

    public function translations()
    {
        return $this->hasMany(CharlyPostTranslation::class);
    }
}
