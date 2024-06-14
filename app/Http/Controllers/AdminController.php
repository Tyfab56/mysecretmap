<?php

namespace App\Http\Controllers;

use App\Models\Spots;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function spots()
    {
        return view('admin/spots');
    }

    public function createzoom()
    {
        $spot = Spots::first();
        return view('admin/createzoom', compact('spot'));
    }

    public function createzoomid(Request $request)
    {

        $spot = Spots::where('id', '=', $request->spotid)->first();
        return view('admin/createzoom', compact('spot'));
    }

    public function showSortedSpotsPage()
    {
        $countries = DB::table('pays')->where('actif', 1)->pluck('name', 'id');
        return view('admin.sorted-spots', compact('countries'));
    }

    public function generateSortedSpots(Request $request)
    {
        $countryId = $request->input('country_id');

        // Validation de l'entrée
        $request->validate([
            'country_id' => 'required|exists:pays,id',
        ]);

        $locale = app()->getLocale();

        // Récupérer le point de départ pour le pays donné
        $defaultSpot = DB::table('default_spot')->where('pays_id', $countryId)->first();

        if (!$defaultSpot) {
            return redirect()->back()->withErrors('Default spot not found for this country.');
        }

        // Récupérer les spots pour le pays donné avec les traductions
        $spots = Spots::where('pays_id', $countryId)
            ->where('actif', 1)
            ->with(['translations' => function ($query) use ($locale) {
                $query->where('locale', $locale)->whereNotNull('description')->where('description', '!=', '');
            }])
            ->get();

        // Filtrer les spots pour ceux ayant une traduction dans la langue actuelle
        $spotsWithTranslations = $spots->filter(function ($spot) use ($locale) {
            return !is_null($spot->translate($locale));
        });

        // Tri des spots pour un parcours logique en utilisant les distances pré-calculées
        $sortedSpots = $this->sortSpots($spotsWithTranslations, $defaultSpot->Spot_id);

        // Vider la table des spots triés pour ce pays
        SortedSpot::where('pays_id', $countryId)->delete();

        // Insérer les spots triés dans la table sorted_spots
        foreach ($sortedSpots as $index => $spot) {
            SortedSpot::create([
                'spot_id' => $spot->id,
                'pays_id' => $countryId,
                'type_id' => $spot->typepoint_id,
                'order' => $index + 1,
            ]);
        }

        return redirect()->back()->with('status', 'Sorted spots refreshed successfully!');
    }

    private function sortSpots($spots, $startSpotId)
    {
        $sortedSpots = collect();
        $currentSpotId = $startSpotId;

        while ($spots->isNotEmpty()) {
            $currentSpot = $spots->firstWhere('id', $currentSpotId);

            if ($currentSpot) {
                $sortedSpots->push($currentSpot);
                $spots = $spots->filter(function ($spot) use ($currentSpotId) {
                    return $spot->id !== $currentSpotId;
                });

                $nextSpotId = $this->findClosestSpot($currentSpotId, $spots->pluck('id')->toArray());

                if ($nextSpotId) {
                    $currentSpotId = $nextSpotId;
                } else {
                    break;
                }
            } else {
                break;
            }
        }

        return $sortedSpots;
    }

    private function findClosestSpot($currentSpotId, $spotIds)
    {
        $closestSpot = DB::table('distances')
            ->where('spot_origine', $currentSpotId)
            ->whereIn('spot_destination', $spotIds)
            ->orderBy('temps', 'asc')
            ->first();

        return $closestSpot ? $closestSpot->spot_destination : null;
    }
}
