<?php

namespace App\Http\Controllers;

use App\Models\Spots;
use App\Models\AudioguideSpot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AudioguideController extends Controller
{
    public function index()
    {
        // Récupérer tous les spots groupés par pays
        $spotsByCountry = Spots::with('pays') // 'pays' is the relationship method in your model
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
    public function importAudioguides(Request $request)
    {
        // Validez le fichier ici si nécessaire
        $filePath = $request->file('file')->getRealPath();

        // Appeler la commande artisan
        Artisan::call('import:audioguides', ['file' => $filePath]);

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Importation des audioguides réussie !');
    }
}
