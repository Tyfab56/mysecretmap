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



    public function getCircuits($lang, $country)
    {
        // Vérifier si la langue est valide
        $languages = Langs::where('actif', 1)->pluck('idlang')->toArray();
        if (!in_array($lang, $languages)) {
            return response()->json(['error' => 'Invalid language'], 400);
        }

        // Récupérer tous les circuits actifs pour le pays spécifié
        $circuits = AppCircuit::with(['translations', 'spots.spot'])
            ->where('actif', 1)
            ->where('pays_id', $country)
            ->get();

        // Construire les données JSON
        $data = $circuits->map(function ($circuit) use ($lang) {
            $translation = $circuit->translations->firstWhere('locale', $lang);

            $firstSpot = $circuit->spots->sortBy('rank')->first();
            $firstImage = $firstSpot && $firstSpot->spot && $firstSpot->spot->firstPhotoApp
                ? $firstSpot->spot->firstPhotoApp->media_filename
                : null;

            return [
                'id' => $circuit->id,
                'title' => $translation->title ?? 'Title not available',
                'description' => $translation->description ?? 'Description not available',
                'days' => $circuit->days,
                'nbspots' => $circuit->nbspots,
                'image' => $firstImage,

            ];
        });

        return response()->json($data, 200, []);
    }
    public function addSpotToCircuit(Request $request)
    {
        // Validation des données entrantes
        $validated = $request->validate([
            'circuit_id' => 'required|exists:appcircuits,id',
            'spot_id' => 'required|exists:spots,id',
            'is_in_circuit' => 'required|boolean',
        ]);

        // Vérifie que le circuit est actif
        $circuit = AppCircuit::find($validated['circuit_id']);
        if (!$circuit->actif) {
            return response()->json([
                'status' => 'error',
                'message' => 'Le circuit est inactif.',
            ], 200);
        }

        // Vérifie que le spot existe
        $spot = Spots::find($validated['spot_id']);
        if (!$spot) {
            return response()->json([
                'status' => 'error',
                'message' => 'Le spot spécifié est introuvable.',
            ], 200);
        }
        // Calcul du rang en fonction de la catégorie (is_in_circuit)
        $nextRankInCircuit = AppCircuitSpot::where('circuit_id', $validated['circuit_id'])
            ->where('is_in_circuit', true)
            ->count() + 1;

        $nextRankBonus = AppCircuitSpot::where('circuit_id', $validated['circuit_id'])
            ->where('is_in_circuit', false)
            ->count() + 1;

        $rank = $validated['is_in_circuit'] ? $nextRankInCircuit : $nextRankBonus;


        // Ajouter ou mettre à jour l'entrée
        $circuitSpot = AppCircuitSpot::updateOrCreate(
            [
                'circuit_id' => $validated['circuit_id'],
                'spot_id' => $validated['spot_id'],

            ],
            [
                'is_in_circuit' => $validated['is_in_circuit'],
                'rank' => $rank,
            ]
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Spot ajouté ou mis à jour dans le circuit.',
            'data' => $circuitSpot,
        ]);
    }
    public function getOptimizedCircuitDetails(Request $request)
    {
        $validated = $request->validate([
            'circuit_id' => 'required|exists:appcircuits,id',
            'locale' => 'required|exists:langs,idlang',
        ]);

        $circuitId = $validated['circuit_id'];
        $locale = $validated['locale'];

        // Récupérer les spots du circuit avec leurs traductions
        $spotsData = AppCircuitSpots::with(['spot.translations' => function ($query) use ($locale) {
            $query->where('locale', $locale);
        }, 'spot.firstPhotoApp'])
            ->where('circuit_id', $circuitId)
            ->get();

        // Trouver le spot de départ avec `rank = 0`
        $startingSpotData = $spotsData->firstWhere('rank', 0);

        if (!$startingSpotData) {
            return response()->json([
                'error' => 'Starting spot with rank 0 not found in this circuit.',
            ], 400);
        }

        $startSpotId = $startingSpotData->spot_id;

        // Récupérer tous les spots à optimiser
        $remainingSpots = $spotsData->filter(fn($spot) => $spot->spot_id !== $startSpotId);

        $orderedSpots = [];
        $currentSpotId = $startSpotId;
        $totalDistance = 0;
        $totalDuration = 0;

        // Ajouter le point de départ
        $startingSpot = $startingSpotData->spot;
        $orderedSpots[] = [
            'spot_id' => $startingSpot->id,
            'title' => $startingSpot->translations->first()?->title ?? $startingSpot->name,
            'description' => $startingSpot->translations->first()?->description,
            'moreguidetext' => $startingSpot->translations->first()?->moreguidetext,
            'lat' => $startingSpot->lat,
            'lng' => $startingSpot->lng,
            'image_url' => $startingSpot->firstPhotoApp?->media_url,
            'time_on_spot' => $startingSpot->timeonsite,
            'hiking_time' => $startingSpot->randotime,
            'parking_paid' => $startingSpot->parkingpayant,
            'distance' => 0,
            'duration' => 0,
        ];

        // Optimiser le circuit
        while ($remainingSpots->isNotEmpty()) {
            // Trouver le spot le plus proche
            $closestSpotData = Distances::where('spot_origine', $currentSpotId)
                ->whereIn('spot_destination', $remainingSpots->pluck('spot_id'))
                ->orderBy('temps', 'asc')
                ->first();

            if (!$closestSpotData) {
                return response()->json([
                    'error' => "No distance data available for spot $currentSpotId.",
                ], 400);
            }

            $closestSpotId = $closestSpotData->spot_destination;

            // Ajouter le spot optimisé
            $spotData = $remainingSpots->firstWhere('spot_id', $closestSpotId);
            $spot = $spotData->spot;

            $orderedSpots[] = [
                'spot_id' => $spot->id,
                'title' => $spot->translations->first()?->title ?? $spot->name,
                'description' => $spot->translations->first()?->description,
                'moreguidetext' => $spot->translations->first()?->moreguidetext,
                'lat' => $spot->lat,
                'lng' => $spot->lng,
                'image_url' => $spot->firstPhotoApp?->media_url,
                'time_on_spot' => $spot->timeonsite,
                'hiking_time' => $spot->randotime,
                'parking_paid' => $spot->parkingpayant,
                'distance' => $closestSpotData->metres,
                'duration' => $closestSpotData->temps,
            ];

            // Mettre à jour le total distance et durée
            $totalDistance += $closestSpotData->metres;
            $totalDuration += $closestSpotData->temps;

            // Mettre à jour le spot courant et retirer le spot traité
            $currentSpotId = $closestSpotId;
            $remainingSpots = $remainingSpots->filter(fn($spot) => $spot->spot_id !== $closestSpotId);
        }

        // Calculer le nombre total de spots
        $spotCount = count($orderedSpots);

        // Réponse JSON
        return response()->json([
            'circuit_id' => $circuitId,
            'locale' => $locale,
            'spots' => $orderedSpots,
            'total_distance' => $totalDistance,
            'total_duration' => $totalDuration,
            'spot_count' => $spotCount,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}
