<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spots;
use App\Models\Distances;
use GuzzleHttp\Client;


class DistanceController extends Controller
{
    public function index($idspot)
    {
        // Trouver les infos sur ce spot
        $spot = Spots::where('id', '=', $idspot)->first();
        $pays_id = $spot->pays_id;
        $start_lat = $spot->latparking;
        $start_lng = $spot->lngparking;
        $updategps = $spot->updategps;

        // Définir l'URL de l'API de Mapbox
        $apiUrl = 'https://api.mapbox.com/directions/v5/mapbox/driving/';
        $client = new Client();

        // Recherche des autres points de la base pour ce pays
        $spots = Spots::where('pays_id', '=', $pays_id)
            ->where('id', '!=', $idspot)
            ->where(function ($query) {
                $query->where('actif', '=', 1)
                    ->orWhere('audioguide', '=', 1);  // Audioguide est true
            })->whereNotNull('latparking')->whereNotNull('lngparking')
            ->get();

        $callCount = 0;
        $maxCalls = 150;

        foreach ($spots as $point) {
            if ($callCount >= $maxCalls) {
                break;
            }

            // Vérification que le spot n'est pas déjà inscrit dans la table
            $verif = Distances::where('spot_origine', '=', $spot->id)
                ->where('spot_destination', '=', $point->id)
                ->first();

            // Vérifier qu'une mise à jour des coordonnées n'a pas été faite
            if ($updategps == 1) {
                $verif = null;
            }

            // Calcul depuis ce point vers la destination
            if (is_null($verif)) {
                $url = $apiUrl . '' . $start_lng . ',' . $start_lat . ';' . $point->lng . ',' . $point->lat . '?access_token=' . env('MAPBOX_ACCESS_TOKEN');
                $response = $client->get($url);
                $data = json_decode($response->getBody(), true);
                sleep(0.5);
                $callCount++;

                // Ecriture des données dans la table
                if ($updategps == 1) {
                    $dist = Distances::where('spot_origine', '=', $spot->id)
                        ->where('spot_destination', '=', $point->id)
                        ->first();

                    if (is_null($dist)) {
                        $dist = new Distances();
                    }
                } else {
                    $dist = new Distances();
                }

                $dist->spot_origine = $spot->id;
                $dist->spot_destination = $point->id;
                $dist->metres = round($data['routes'][0]['distance']);
                $dist->temps = round($data['routes'][0]['duration']);
                $dist->geometry = $data['routes'][0]['geometry'];
                $dist->save();

                // Mise à jour de nbdistance dans la table
                $count = Distances::where('spot_origine', '=', $spot->id)->count();
                $spot->nbdistance = $count;
                $spot->save();

                // Calcul inverse
                $spotinverse = Spots::where('pays_id', '=', $pays_id)
                    ->where('id', '=', $point->id)
                    ->where('actif', '=', 1)
                    ->first();

                $url = $apiUrl . '' . $spotinverse->lngparking . ',' . $spotinverse->latparking . ';' . $start_lng . ',' . $start_lat . '?access_token=' . env('MAPBOX_ACCESS_TOKEN');
                $response = $client->get($url);
                $data = json_decode($response->getBody(), true);
                sleep(0.5);
                $callCount++;

                $dist = Distances::where('spot_origine', '=', $spotinverse->id)
                    ->where('spot_destination', '=', $spot->id)
                    ->first();

                if (is_null($dist)) {
                    $dist = new Distances();
                }

                $dist->spot_origine = $spotinverse->id;
                $dist->spot_destination = $spot->id;
                $dist->metres = round($data['routes'][0]['distance']);
                $dist->temps = round($data['routes'][0]['duration']);
                $dist->geometry = $data['routes'][0]['geometry'];
                $dist->save();

                // Mise à jour de nbdistance dans la table
                $count = Distances::where('spot_origine', '=', $spotinverse->id)->count();
                $spotinverse->nbdistance = $count;
                $spotinverse->save();
            }

            // Réinitialisation de l'indicateur de mise à jour pour le point d'origine
            $spot->updategps = 0;
            $spot->save();
        }

        return back()->with('message', 'Distance calculée pour ce spot');
    }

    public function deleteDistances(Request $request)
    {
        $pointId = $request->input('point_id');

        // Suppression des distances où le point est l'origine
        Distances::where('spot_origine', '=', $pointId)->delete();

        // Suppression des distances où le point est la destination
        Distances::where('spot_destination', '=', $pointId)->delete();

        // Récupérer le spot correspondant
        $spot = Spots::find($pointId);

        // Vérifier si le spot existe avant de mettre à jour
        if ($spot) {
            $count = Distances::where('spot_origine', '=', $spot->id)->count();
            $spot->nbdistance = $count;
            $spot->save();
        }

        // Retourner une réponse, rediriger ou retourner une vue
        return redirect()->back()->with('success', 'Distances supprimées avec succès.');
    }
}
