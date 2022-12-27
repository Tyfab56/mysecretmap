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
        $spot = Spots::where('id','=',$idspot)->first();
        $pays_id = $spot->pays_id;
        $start_lat = $spot->lat;
        $start_lng = $spot->lng;


        // Définir l'URL de l'API de Graphopper
     
        $apiUrl = 'https://api.mapbox.com/directions/v5/mapbox/driving/';

       
        // Créer un nouveau client HTTP
        $client = new Client();

        // Recherche des autres points de la base pour ce pays
        $spots = Spots::where('pays_id','=',$pays_id)->where('id','!=',$idspot)->where('actif','=',1)->get();

        foreach ($spots as $point)
        {

            // verification que le spot n'est pas deja inscrit dans la table


            $verif  = Distances::where('spot_origine','=',$spot->id)->where('spot_destination','=',$point->id)->first();
             if (is_null($verif))
             {
                 $url = $apiUrl.''.$start_lng.','.$start_lat.';'.$point->lng.','.$point->lat.'?access_token='.env('MAPBOX_ACCESS_TOKEN');          
                 $response = $client->get($url);
                 $data = json_decode($response->getBody(), true);
                 sleep(0.5);
              

                 // Ecriture des données dans la table
                 $dist = new Distances();
                 $dist->spot_origine = $spot->id;
                 $dist->spot_destination = $point->id;
                 $dist->metres =round($data['routes'][0]['distance']);
                 $dist->temps = round($data['routes'][0]['duration']);
                 $dist->geometry = $data['routes'][0]['geometry'];
                 $dist->save();
             }

        // mise à jour de nbdistance dans la table
        $count = Distances::where('spot_origine','=',$spot->id)->count();
        $spot->nbdistance = $count;
        $spot->save();

        }

        return back()->with('message', 'Distance calculée pour ce spot');
    }
}