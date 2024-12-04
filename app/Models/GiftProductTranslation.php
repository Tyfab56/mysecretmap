<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiftProductTranslation extends Model
{
    public $timestamps = true; // Gestion automatique des horodatages

    protected $fillable = [
        'title',
        'description',
        'lang',
    ];

    /**
     * Définir la clé étrangère pour la relation avec GiftProduct.
     */
    public function giftProduct()
    {
        return $this->belongsTo(GiftProduct::class, 'product_id');
    }
}
