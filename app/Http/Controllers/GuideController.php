<?php

namespace App\Http\Controllers;

use App\Models\Spots;
use App\Models\AudioguideSpot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AudioguideController extends Controller
{
    public function index($country_code, $lang)
    {
        if (!in_array($lang, ['fr', 'en', 'de', 'it'])) {
            abort(404);
        }

        // Load the correct view from 'guide' folder
        return view('guide.index', compact('country_code', 'lang'));
    }
}
