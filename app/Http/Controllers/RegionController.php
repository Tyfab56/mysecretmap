<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function getRegionsByCountry($countryId)
    {
        $regions = Region::where('pays_id', $countryId)->get();
        return response()->json($regions);
    }
}
