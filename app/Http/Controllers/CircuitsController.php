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
            'spot_ids' => 'array',
        ]);

        if (empty($validated['spot_ids'])) {
            return response()->json([
                'user_id' => $validated['user_id'],
                'country_code' => $validated['country_code'],
                'circuit' => [],
                'total_distance' => 0,
                'total_duration' => 0,
                'spot_count' => 0,
            ]);
        }


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
    public function optimizeCircuitWithDays(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'country_code' => 'required|size:2',
            'start_spot_id' => 'required|exists:spots,id',
            'spot_ids' => 'array',
            'timetravel' => 'integer|min:1|max:24', // Nombre d'heures max par jour
        ]);

        if (empty($validated['spot_ids'])) {
            return response()->json([
                'user_id' => $validated['user_id'],
                'country_code' => $validated['country_code'],
                'circuit' => [],
                'total_distance' => 0,
                'total_duration' => 0,
                'spot_count' => 0,
            ]);
        }

        $userId = $validated['user_id'];
        $countryCode = $validated['country_code'];
        $startSpotId = $validated['start_spot_id'];
        $spotIds = $validated['spot_ids'];
        $timePerDay = ($validated['timetravel'] ?? 8) * 60 * 60; // Convertir heures en secondes

        $remainingSpots = $spotIds;
        $currentSpotId = $startSpotId;
        $orderedSpots = [];
        $totalDistance = 0;
        $totalDuration = 0;
        $dayCircuits = []; // Structure pour stocker les circuits journaliers
        $currentDayTime = 0;
        $currentDay = 1;

        // Ajouter le point de départ à la liste du jour 1
        $startSpot = Spots::with('firstPhotoApp')->find($startSpotId);
        $currentDaySpots = [[
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
        ]];

        while (!empty($remainingSpots)) {
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
            $spot = Spots::with('firstPhotoApp')->find($closestSpotId);

            // Calculer le temps total pour ce spot
            $spotTotalTime = $closestSpotData->temps + ($spot->randotime * 2) + $spot->timeonsite;

            // Si ajouter ce spot dépasse le temps quotidien, on passe au jour suivant
            if ($currentDayTime + $spotTotalTime > $timePerDay) {
                $dayCircuits[] = [
                    'day' => $currentDay,
                    'spots' => $currentDaySpots,
                    'total_time' => $currentDayTime,
                ];
                $currentDay++; // Prochain jour
                $currentDayTime = 0;
                $currentDaySpots = [];
            }

            // Ajouter le spot au circuit du jour courant
            $currentDaySpots[] = [
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

            $currentDayTime += $spotTotalTime;
            $totalDistance += $closestSpotData->metres;
            $totalDuration += $closestSpotData->temps;

            // Mettre à jour le spot courant et retirer le spot traité
            $currentSpotId = $closestSpotId;
            $remainingSpots = array_filter($remainingSpots, fn($id) => $id !== $closestSpotId);
        }

        // Ajouter le dernier jour
        if (!empty($currentDaySpots)) {
            $dayCircuits[] = [
                'day' => $currentDay,
                'spots' => $currentDaySpots,
                'total_time' => $currentDayTime,
            ];
        }

        return response()->json([
            'user_id' => $userId,
            'country_code' => $countryCode,
            'circuit' => $dayCircuits,
            'total_distance' => $totalDistance,
            'total_duration' => $totalDuration,
            'spot_count' => count($spotIds),
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

            // Calculer dynamiquement le nombre de spots
            $spotCount = $circuit->spots->count();



            return [
                'id' => $circuit->id,
                'title' => $translation->title ?? 'Title not available',
                'description' => $translation->description ?? 'Description not available',
                'days' => $circuit->days,
                'nbspots' => $spotCount,
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

        // Calcul du nouveau rang pour le spot ajouté
        $maxRank = AppCircuitSpot::where('circuit_id', $validated['circuit_id'])
            ->where('is_in_circuit', $validated['is_in_circuit'])
            ->max('rank');
        $newRank = $maxRank + 1;

        // Ajouter ou mettre à jour l'entrée
        $circuitSpot = AppCircuitSpot::updateOrCreate(
            [
                'circuit_id' => $validated['circuit_id'],
                'spot_id' => $validated['spot_id'],
            ],
            [
                'is_in_circuit' => $validated['is_in_circuit'],
                'rank' => $newRank,
            ]
        );

        // Récupérer tous les spots du circuit pour optimisation
        $spotsData = AppCircuitSpot::where('circuit_id', $circuit->id)
            ->with('spot')
            ->get();


        // Trouver le spot de départ avec le rang = 1
        $startingSpotData = $spotsData->firstWhere('rank', 1);
        if (!$startingSpotData) {
            return response()->json([
                'status' => 'error',
                'message' => 'Aucun point de départ trouvé avec le rang 1.',
            ], 400);
        }

        $startSpotId = $startingSpotData->spot_id;
        $remainingSpots = $spotsData->filter(fn($spot) => $spot->spot_id !== $startSpotId);

        $currentSpotId = $startSpotId;
        $totalDistance = 0;
        $totalDuration = 0;
        $totalRandotime = 0;
        $totalTimeonsite = 0;
        $rank = 1;

        // Optimiser les spots
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
            $spotData = $remainingSpots->firstWhere('spot_id', $closestSpotId);
            $spot = $spotData->spot;

            // Mise à jour du rang
            AppCircuitSpot::where('circuit_id', $circuit->id)
                ->where('spot_id', $spot->id)
                ->update(['rank' => ++$rank]);

            // Mettre à jour les totaux
            $totalDistance += $closestSpotData->metres;
            $totalDuration += $closestSpotData->temps;
            $totalRandotime += $spot->randotime;
            $totalTimeonsite += $spot->timeonsite;

            // Mettre à jour le spot courant et retirer le spot traité
            $currentSpotId = $closestSpotId;
            $remainingSpots = $remainingSpots->filter(fn($spot) => $spot->spot_id !== $closestSpotId);
        }

        // Calcul du nombre total de spots
        $spotCount = $spotsData->count();
        // Sauvegarde des totaux dans la table `appcircuits`
        $circuit->update([
            'distance' => $totalDistance,
            'duration' => $totalDuration,
            'randotime' => $totalRandotime,
            'timeonsite' => $totalTimeonsite,
            'nbspots' => $spotCount,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Spot ajouté ou mis à jour dans le circuit et optimisation effectuée.',
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
        $spotsData = AppCircuitSpot::with(['spot.translations' => function ($query) use ($locale) {
            $query->where('locale', $locale);
        }, 'spot.firstPhotoApp'])
            ->where('circuit_id', $circuitId)
            ->get();

        // Trouver le spot de départ avec `rank = 0`
        $startingSpotData = $spotsData->firstWhere('rank', 1);

        if (!$startingSpotData) {
            return response()->json([
                'error' => 'Starting spot with rank 1 not found in this circuit.',
            ], 400);
        }

        $startSpotId = $startingSpotData->spot_id;

        // Récupérer tous les spots à optimiser
        $remainingSpots = $spotsData->filter(fn($spot) => $spot->spot_id !== $startSpotId);

        $orderedSpots = [];
        $currentSpotId = $startSpotId;
        $totalDistance = 0;
        $totalDuration = 0;
        $totalRandotime = 0;
        $totalTimeonsite = 0;

        // Ajouter le point de départ
        $startingSpot = $startingSpotData->spot;
        $orderedSpots[] = [
            'spot_id' => $startingSpot->id,
            'title' => $startingSpot->translations->first()?->title ?? $startingSpot->name,
            'description' => $startingSpot->translations->first()?->moreguidetext,
            'lat' => $startingSpot->lat,
            'lng' => $startingSpot->lng,
            'image_url' => $startingSpot->firstPhotoApp?->media_filename,
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
                'description' => $spot->translations->first()?->moreguidetext,
                'lat' => $spot->lat,
                'lng' => $spot->lng,
                'image_url' => $spot->firstPhotoApp?->media_filename,
                'time_on_spot' => $spot->timeonsite,
                'hiking_time' => $spot->randotime,
                'parking_paid' => $spot->parkingpayant,
                'distance' => $closestSpotData->metres,
                'duration' => $closestSpotData->temps,
            ];

            // Mettre à jour le total distance et durée
            $totalDistance += $closestSpotData->metres;
            $totalDuration += $closestSpotData->temps;
            $totalRandotime += $spot->randotime;
            $totalTimeonsite += $spot->timeonsite;

            // Mettre à jour le spot courant et retirer le spot traité
            $currentSpotId = $closestSpotId;
            $remainingSpots = $remainingSpots->filter(fn($spot) => $spot->spot_id !== $closestSpotId);
        }

        // Calculer le nombre total de spots
        $spotCount = count($orderedSpots);

        // Mise à jour des infos sur la table


        // Réponse JSON
        return response()->json([
            'circuit_id' => $circuitId,
            'locale' => $locale,
            'spots' => $orderedSpots,
            'total_distance' => $totalDistance,
            'total_duration' => $totalDuration,
            'total_timeonsite' => $totalTimeonsite,
            'total_randotime' => $totalRandotime,
            'spot_count' => $spotCount,
        ], 200, []);
    }
}
