<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegionTranslation extends Model
{
    // Define the table name if not following the default naming convention
    protected $table = 'regions_translations';

    // Specify which fields are mass assignable
    protected $fillable = ['name', 'locale', 'region_id'];

    // Disable timestamps if your table does not have `created_at` and `updated_at`
    public $timestamps = false;

    // Define the relationship back to the Region
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
