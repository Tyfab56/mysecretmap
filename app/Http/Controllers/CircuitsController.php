<?php

namespace App\Http\Controllers;

use App\Models\Circuits;
use App\Models\Circuits_details;
use App\Models\AppUserCircuit;
use App\Models\Spots;
use App\Models\Distances;
use App\Models\MediasSpotApp;


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
        $circuit = AppUserCircuit::firstOrCreate(
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

        return response()->json([
            'user_id' => $userId,
            'country_code' => $countryCode,
            'circuit' => $orderedSpots,
            'total_distance' => $totalDistance,
            'total_duration' => $totalDuration,
        ]);
    }
}
