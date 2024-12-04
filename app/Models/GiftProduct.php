<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class GiftProduct extends Model
{
    use Translatable;

    protected $fillable = [
        'image_url',
        'price',
        'discount_price',
        'coupon',
        'shop_link',
        'is_active',
        'created_at',
        'updated_at',
    ];

    // Champs traduisibles
    public $translatedAttributes = ['title', 'description'];

    /**
     * Indique si les horodatages sont gérés automatiquement.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Relation avec les traductions.
     */
    public function translations()
    {
        return $this->hasMany(GiftProductTranslation::class);
    }
}
