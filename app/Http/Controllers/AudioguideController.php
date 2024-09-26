<?php

namespace App\Http\Controllers;

use App\Models\Spots;
use App\Models\AudioguideSpot;
use Illuminate\Http\Request;

class AudioguideController extends Controller
{
    public function index()
    {
        // Récupérer tous les spots groupés par pays
        $spotsByCountry = Spots::with('country')
            ->get()
            ->groupBy('pays_id');

        return view('admin.audioguides.index', compact('spotsByCountry'));
    }

    public function addSpot(Request $request)
    {
        $spotId = $request->input('spot_id');
        $languageCode = $request->input('language_code');

        // Vérifier si le spot est déjà dans l'audioguide pour cette langue
        $exists = AudioguideSpot::where('spot_id', $spotId)
            ->where('language_code', $languageCode)
            ->exists();

        if (!$exists) {
            AudioguideSpot::create([
                'spot_id' => $spotId,
                'language_code' => $languageCode,
            ]);
        }

        return back()->with('success', 'Spot ajouté à l\'audioguide.');
    }

    public function removeSpot(Request $request)
    {
        $spotId = $request->input('spot_id');
        $languageCode = $request->input('language_code');

        AudioguideSpot::where('spot_id', $spotId)
            ->where('language_code', $languageCode)
            ->delete();

        return back()->with('success', 'Spot retiré de l\'audioguide.');
    }
}
