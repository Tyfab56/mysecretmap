<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use DB;

class Pays extends Model implements TranslatableContract
{

    use Translatable;

    public $translatedAttributes =  ['libelle'];

    protected $fillable = [
        'pays_id',
        'pays',
        'lat',
        'lng',
        'zoom',
        'actif',
        'offset',

    ];
    protected $guarded = [];

    public function getLibelle($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $translation = DB::table('pays_translations')
            ->where('pays_id', $this->pays_id)
            ->where('locale', $locale)
            ->first();

        return $translation ? $translation->libelle : 'Pays non traduit';
    }

    public function spot()
    {
        return $this->hasMany(Spots::class, 'pays_id', 'pays_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'mypays_id', 'pays_id');
    }

    public function folders()
    {
        return $this->hasMany(Folder::class, 'country_id', 'pays_id');
    }
}
