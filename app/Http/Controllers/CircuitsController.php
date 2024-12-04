<?php

namespace App\Http\Controllers;

use App\Models\Circuits;
use App\Models\Circuits_details;
use App\Models\AppUserCircuit;
use App\Models\Spots;
use App\Models\Distances;
use App\Models\MediasSpotApp;
use Illuminate\Support\Facades\Storage;
use App\Models\AppCircuit;
use App\Models\AppCircuitSpot;
use App\Models\Langs;


use Illuminate\Http\Request;

class CircuitsController extends Controller
{
    public function index()
    {
        $circuits = Circuits::where('user_id', '=', 1)->get();
        return view('admin.circuits', compact('circuits'));
    }

    public function optimizeCircuit(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'country_code' => 'required|size:2',
            'start_spot_id' => 'required|exists:spots,id',
            'spot_ids' => 'required|array',
        ]);

        $userId = $validated['user_id'];
        $countryCode = $validated['country_code'];
        $startSpotId = $validated['start_spot_id'];
        $spotIds = $validated['spot_ids'];

        // Vérifier ou créer un circuit
        $circuit = AppUserCircuit::updateOrCreate(
            [
                'user_id' => $userId,
                'country_code' => $countryCode,
            ],
            [
                'spot_ids' => json_encode($spotIds),
            ]
        );

        $remainingSpots = $spotIds;
        $currentSpotId = $startSpotId;
        $orderedSpots = [];
        $totalDistance = 0;
        $totalDuration = 0;

        // Ajouter le point de départ à la liste ordonnée
        $startSpot = Spots::with('firstPhotoApp')->find($startSpotId);
        $orderedSpots[] = [
            'spot_id' => $startSpot->id,
            'title' => $startSpot->name,
            'image_url' => $startSpot->firstPhotoApp?->media_filename ?? null,
            'distance' => 0, // Le point de départ n'a pas de distance
            'duration' => 0, // Le point de départ n'a pas de durée
            'lat' => $startSpot->lat,
            'lng' => $startSpot->lng,
            'time_on_spot' => $startSpot->timeonsite,
            'hiking_time' => $startSpot->randotime,
            'parking_paid' => $startSpot->parkingpayant,
        ];


        while (!empty($remainingSpots)) {
            // Récupérer les distances pour le spot courant, trier par temps croissant
            $closestSpotData = Distances::where('spot_origine', $currentSpotId)
                ->whereIn('spot_destination', $remainingSpots)
                ->orderBy('temps', 'asc')
                ->first();

            if (!$closestSpotData) {
                return response()->json([
                    'error' => "No distance data available for spot $currentSpotId."
                ], 400);
            }

            $closestSpotId = $closestSpotData->spot_destination;

            // Ajouter le spot le plus proche à la liste ordonnée
            $spot = Spots::with('firstPhotoApp')->find($closestSpotId);
            $orderedSpots[] = [
                'spot_id' => $spot->id,
                'title' => $spot->name,
                'image_url' => $spot->firstPhotoApp?->media_filename ?? null,
                'distance' => $closestSpotData->metres,
                'duration' => $closestSpotData->temps,
                'lat' => $spot->lat,
                'lng' => $spot->lng,
                'time_on_spot' => $spot->timeonsite,
                'hiking_time' => $spot->randotime,
                'parking_paid' => $spot->parkingpayant,
            ];

            // Ajouter distance et durée au total
            $totalDistance += $closestSpotData->metres;
            $totalDuration += $closestSpotData->temps;

            // Mettre à jour le spot courant
            $currentSpotId = $closestSpotId;

            // Retirer le spot traité des spots restants
            $remainingSpots = array_filter($remainingSpots, fn($id) => $id !== $closestSpotId);
        }

        // Mise à jour du circuit avec les totaux
        $circuit->update([
            'distance_total' => $totalDistance,
            'duration_total' => $totalDuration,
        ]);
        // Compter le nombre de spots dans le circuit
        $spotCount = count($orderedSpots);

        return response()->json([
            'user_id' => $userId,
            'country_code' => $countryCode,
            'circuit' => $orderedSpots,
            'total_distance' => $totalDistance,
            'total_duration' => $totalDuration,
            'spot_count' => $spotCount,
        ]);
    }

    public function generateJson()
    {
        // Récupérer tous les circuits actifs
        $circuits = AppCircuit::with(['translations', 'spots.spot'])->where('actif', 1)->get();

        // Langues disponibles
        $languages = Langs::where('actif', 1)->pluck('idlang')->toArray();

        $dataByLang = [];

        // Construire les données JSON pour chaque langue
        foreach ($languages as $lang) {
            $dataByLang[$lang] = $circuits->map(function ($circuit) use ($lang) {
                // Récupérer la traduction correspondante
                $translation = $circuit->translations->firstWhere('locale', $lang);

                // Récupérer le premier spot
                $firstSpot = $circuit->spots->sortBy('rank')->first();
                $firstImage = $firstSpot && $firstSpot->spot && $firstSpot->spot->firstPhotoApp
                    ? $firstSpot->spot->firstPhotoApp->media_url
                    : null;

                return [
                    'id' => $circuit->id,
                    'title' => $translation->title ?? 'Title not available',
                    'description' => $translation->description ?? 'Description not available',
                    'days' => $circuit->days,
                    'nbspots' => $circuit->nbspots,
                    'image' => $firstImage,
                    'spots' => $circuit->spots->map(function ($spot) {
                        return [
                            'id' => $spot->spot_id,
                            'rank' => $spot->rank,
                            'type' => $spot->is_in_circuit ? 'in' : 'bonus',
                        ];
                    })->toArray(),
                ];
            });
        }

        // Générer et stocker les fichiers JSON
        foreach ($dataByLang as $lang => $data) {
            $filePath = "assets/circuits_{$lang}.json";
            Storage::disk('public')->put($filePath, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }

        return response()->json([
            'status' => 'success',
            'message' => 'JSON files generated successfully!',
        ]);
    }
}
