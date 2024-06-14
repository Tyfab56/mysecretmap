<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Pays;
use App\Models\Spots;
use App\Models\CharlyPost;
use App\Models\Circuits;
use App\Models\Circuits_details;
use App\Models\Pictures;
use App\Models\Default_spots;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Frontend\IndexController as FrontendIndexController;
use Illuminate\Support\Facades\DB;
use Helper;
use Illuminate\Pagination\LengthAwarePaginator;

class DestinationController extends Controller
{
    public function index($id, $spotid = null)
    {
        // Chargement des infos pays
        // lat : lng : zoom

        if (!is_null($spotid)) {
            $spot = Spots::where('id', '=', $spotid)
                ->where('pays_id', '=', $id)->first();
            if (is_null($spot)) {
                return redirect()->route('home');
            }
        } else {
            $spot = null;
        }

        $idpays = $id;
        Session::put('lastPays', $idpays);
        $pays = Pays::where('pays_id', '=', $idpays)->first();
        if (is_null($pays)) {
            return redirect()->route('home');
        }
        $payslat = $pays->lat;
        $payslng = $pays->lng;
        $payszoom = $pays->zoom;
        $paysoffset = $pays->offset;

        // Chargement des markers de la carte
        $markers = Spots::select('id', 'name', 'lng', 'lat', 'imgpanosmall', 'imgsquaresmall',   'typepoint_id')
            ->where('pays_id', $idpays)->where('actif', 1)->where('maps_id', 1)->get();

        $payslist = Pays::where('actif', '=', 1)->orderBy('pays', 'asc')->get();

        // Un user est t'il connecté
        $userid = Auth::user();
        if ($userid) {
            $iduser = $userid->id;
            //  Chargement des circuit de cet user pour ce pays
            $circuits = Circuits::where('user_id', '=', $userid->id)->where('pays_id', '=', $idpays)->get();
            $nbcircuit = ($circuits->count());

            // Si pas de cictuit en créer un
            if ($nbcircuit == 0) {
                $circuit = new Circuits();

                $circuit->user_id = $iduser;
                $circuit->pays_id = $idpays;
                $circuit->titrecircuit =  $pays->pays;
                $circuit->save();



                // Inserer le point par defaut
                $idspotdefaut = Default_spots::where('pays_id', '=', $idpays)->first()->spot_id;
                // Creation du premier point
                $firstpoint = new Circuits_details();

                $firstpoint->circuit_id = $circuit->id;
                $firstpoint->rang = 1;
                $firstpoint->spot_id = $idspotdefaut;
                $firstpoint->save();
                $circuits = Circuits::where('user_id', '=', $userid->id)->where('pays_id', '=', $idpays)->get();

                // rendre ce circuit actif
                Session::put('circuitactif', $circuit->id);
                $circuitactif = $circuit->id;
            } else {
                // Plusieurs circuits possibles
                // si un circuit est actif pour ce pays on le choisi
                // Sinon on prend el premier pour ce pays
                if (Session::get('circuitactif')) {
                    $circuitatester = Session::get('circuitactif');
                    // verififie qu'il est dans le pays en cours
                    $existe = Circuits::where('user_id', '=', $iduser)->where('pays_id', '=', $idpays)->where('id', '=', $circuitatester)->count();
                    // si le circuit actif est dans le bon pays on valide
                    if ($existe == 1)
                    // on valide ce circuit comme actif
                    {
                        $circuitactif = $circuitatester;
                    } else
                    // on prend le premier circuit du nouveau pays
                    {
                        $premiercircuit = Circuits::where('user_id', '=', $iduser)->where('pays_id', '=', $idpays)->first();
                        Session::put('circuitactif', $premiercircuit->id);
                        $circuitactif = $premiercircuit->id;
                    }
                } else // pas de circuit actif pour le moment on prend le premier
                {
                    $premiercircuit = Circuits::where('user_id', '=', $iduser)->where('pays_id', '=', $idpays)->first();
                    Session::put('circuitactif', $premiercircuit->id);
                    $circuitactif = $premiercircuit->id;
                }

                // Recuperation du circuit geometrique
                // Sous forme de plusieurs segments
                $allgeometry = Circuits_details::where('circuit_id', '=', $circuitactif)->where('geometry', '<>', null)->get();
                $geometry = array();
                foreach ($allgeometry as $geo) {
                    array_push($geometry, $geo->geometry);
                }

                // $geometry = Helper::polyline2_decode($geometry);


            }
        } else {
            $circuits = null;
            $circuitactif = 0;
            $geometry = '';
        }



        // Comptage du nombre de pictures
        return view('frontend/destination', compact('idpays', 'markers', 'pays', 'payslist', 'payslng', 'payslat', 'payszoom', 'paysoffset', 'spot', 'circuits', 'circuitactif', 'geometry'));
    }


    public function getzoom($idspot)
    {
        $spotzoom = Spots::select('imgZoomLarge')->where('id', '=', $idspot)->first();

        return response($spotzoom, 200);
    }
    public function listmarkers($idpays, $nelat, $nelng, $swlat, $swlng)
    {

        $markers = Spots::select('id', 'name', 'lng', 'lat', 'imgpanosmall', 'imgsquaresmall')
            ->where('lat', '<', $nelat)
            ->where('lat', '>', $swlat)
            ->where('lng', '<', $nelng)
            ->where('lng', '>', $swlng)
            ->where('pays_id', '=', $idpays)
            ->where('actif', '=', 1)
            ->where('maps_id', '=', 1)
            ->get()->toJson();

        return response($markers, 200);
    }

    public function pictures($idspot)
    {
        $spot = Spots::where('id', '=', $idspot)->first();
        $pictures = Pictures::where('spot_id', '=', $idspot)->where('actif', '=', 1)->paginate(20);
        return view('frontend/pictures', compact('spot', 'pictures'));
    }

    // Ajout de spot dans un circuit
    // ----------------------------------------------------------------------------
    public function addtour($idspot, $idcircuit = null)
    {
        // Determiner l'id du user
        $thisuser = Auth::user();
        if ($thisuser) {

            $iduser = $thisuser->id;
            //Chargement du spot en cours
            $spot = Spots::where('id', '=', $idspot)->first();
            if (is_null($spot)) {
                return back()->with('message', 'error spot');
            }
            $idpays = $spot->pays_id;

            // Verification du circuit
            $circuit = Circuits::where('user_id', '=', $iduser)->where("pays_id", "=", $idpays)->where('id', '=', $idcircuit)->count();
            if ($circuit == 0) {

                return back()->with('message', 'error circuit');
            }

            // verification que le spot n'est pas deja inscrit dans ce circuit
            $existe = Circuits_details::where('circuit_id', '=', $idcircuit)->where('spot_id', '=', $idspot)->count();
            if ($existe == 0) {
                // recherche du rang d'insetion
                // PAr default on le met à la fin et lance un refresh pour recalculer le tour

                $newpoint = new Circuits_details();
                $newpoint->circuit_id = $idcircuit;
                $newpoint->spot_id = $idspot;

                $newpoint->rang = 999;
                $newpoint->save();
            } else {


                return back()->with('message', 'spot existant');
            }
        } else
        // Non identifié
        {
            return redirect()->route('login');
        }
        // Rafraichir la liste
        $this->refreshtour($idpays, $idcircuit);

        return redirect()->route('destination', ['id' => $idpays, 'spotid' => $idspot])->with('message', 'spot ajouté');
    }
    public function removetour($idspot, $idcircuit)
    {
        // recherche du pays de ce spot
        $idpays = Spots::Where('id', '=', $idspot)->first()->pays_id;
        // suppression du tour
        $results = DB::select("delete from circuits_details where circuit_id = ? and spot_id = ?", [$idcircuit, $idspot]);
        // reffraichir
        $this->refreshtour($idpays, $idcircuit);
        return redirect()->route('destination', ['id' => $idpays, 'spotid' => $idspot]);
    }
    // test appel de la fonction de rafraichissement
    public function updatetour($idpays, $idcircuit)
    {

        $this->refreshtour($idpays, $idcircuit);
        return redirect()->route('destination', ['id' => $idpays]);
    }


    public function refreshtour($idpays, $idcircuit)
    {

        // Parcourir tous les point set les remettre à leur place
        // todo ajouter des point qui ne peuvent pas etre déplacé ou qui doivent absolument etre apres un autre
        // avec valeur colonne : tobeafterspot
        // exclure de la liste ceux qui ont une valeur à tobeafterspot / traité à part

        $listepoints = Circuits_details::where('circuit_id', '=', $idcircuit)->where('tobeafterspot', '=', null)->get();

        // mettre tout les spot à 999 / Meme ceux tobeafterspot
        $results = DB::select("update circuits_details set rang = 999 where circuit_id = ? and rang > 1", [$idcircuit]);

        // mise à zero des informations temps,distance et geometry sur le circuit en cours
        $circuit = Circuits::where('id', '=', $idcircuit)->first();
        $circuit->tempstotal = 0;
        $circuit->distancetotal = 0;
        $circuit->geometry = '';
        $circuit->save();

        $tempscumul = 0;
        $metrescumul = 0;
        $geometry = '';
        $listegeometry = array();
        $polyline = array();

        $i = 1;
        // Re-indexer tous les points
        foreach ($listepoints as $point) {

            //si c'est le premier point on fait
            if ($i == 1) {
                $pointencours = $point->id;
                $spotencours = $point->spot_id;
                $point->rang = 1;
                // cherche les infos de ce spot
                $infospot = Spots::where('id', '=', $spotencours)->first();

                $point->timeonsite = $infospot->timeonsite;
                $point->save();
            }

            // todo recherche s'il y a un point tobeafterspot pour $spotencours et l'inserer puis continuer la boucle


            //  >>>>>>>> traitement ici
            // en faire le nouveau $spotencours

            // traitement : recherche du point le plus proche
            $results = DB::select("SELECT id,spot_destination,temps,metres,geometry FROM distances WHERE spot_origine = ? AND temps = ( SELECT min(temps) FROM `distances` WHERE spot_origine = ? AND spot_destination IN ( SELECT spot_id FROM circuits_details WHERE circuit_id = ? AND rang > ? ) ) limit 1", [$spotencours, $spotencours, $idcircuit, $i]);
            // Donner à ce point l'indice i
            // faire de ce point le nouveau pointencours


            if ($results) {
                $pointencours = $results[0]->id;
                $spotencours = $results[0]->spot_destination;

                // Charger les infos de ce spot
                $infospot = Spots::where('id', '=', $spotencours)->first();

                // mise à jour des infos du circuit
                $tempscumul = $tempscumul + $results[0]->temps + $infospot->timeonsite;
                $metrescumul = $metrescumul + $results[0]->metres;


                // mise à jour des infos sur ce spots dans le circuit
                $newspot = Circuits_details::where('spot_id', '=', $spotencours)->where('circuit_id', '=', $idcircuit)->first();
                $newspot->rang = $i + 1;
                $newspot->temps = $results[0]->temps;

                // Allez chercher l'info timeonsite du spot en cours 
                $newspot->timeonsite = $infospot->timeonsite;

                // ajout du temps sur site 
                //$newspot->timeonsite = $infospot->timeonsite;       

                $newspot->tempscumul = $tempscumul;
                $newspot->metrescumul = $metrescumul;
                $newspot->metres = $results[0]->metres;
                $newspot->geometry = $results[0]->geometry;

                $newspot->save();
                // stockage des points GPS du trajet


                //dd($results[0]->geometry);
                $polyline = Helper::polyline2_decode($results[0]->geometry);
                //$polyline = Helper::pair($polyline);




                $listegeometry    = array_merge($listegeometry, $polyline);
                // mise à jour des infos de rando et temps sur place TODO



            }

            $i = $i + 1;
        }

        // Compilation de la geometry du circuit
        //$polyline = Helper::flatten($listegeometry); 
        //$polyline = Helper::polyline2_encode($listegeometry);
        $polyline = Helper::polyline2_encode($listegeometry);
        //MISE À JOUR DES INFOS DU CIRCUIT
        $circuit->tempstotal = $tempscumul;
        $circuit->distancetotal = $metrescumul;
        $circuit->geometry = $polyline;
        $circuit->save();

        // return redirect()->route('destination', ['id' => $idpays])->with('message', 'circuit mis à jour');
        return;
    }


    public function thewall($idpays, $tri = null, $size = null)
    {


        if (is_null($size)) {
            $imagesize = 'imgsquaresmall';
        } else {
            $imagesize = 'imgpanosmall';
        }

        if (is_null($tri)) {
            $tri = 1;
        }

        if ($tri == 1) {
            $spots = Spots::select('id', 'name', $imagesize)
                ->where('pays_id', $idpays)->inRandomOrder()->where('actif', 1)->get();
        } elseif ($tri == 2) {
            $spots = Spots::select('id', 'name', $imagesize)
                ->where('pays_id', $idpays)->orderBy('name', 'asc')->where('actif', 1)->get();
        } elseif ($tri == 3) {
            $spots = Spots::select('id', 'name', $imagesize)
                ->where('pays_id', $idpays)->orderBy('created_at', 'desc')->where('actif', 1)->get();
        }



        $pays = Pays::where('pays_id', $idpays)->first();
        $countries = Pays::where('actif', 1)->get();

        return view('frontend/thewall', compact('spots', 'idpays', 'pays', 'countries'));
    }

    public function circuit($idcircuit)
    {
        $circuit = Circuits_Details::where('circuit_id', '=', '$idcircuit')->orderBy('rang')->get();
        return view('frontend/circuit', compact('circuit'));
    }

    public function gallery($idspot)

    {
        if ($idspot) {
            // Selectionnez unqiement ce spot
            $pictures = Pictures::where('spot_id', $idspot)->orderByDesc('id')->paginate(40);
            return view('frontend.gallery', compact('pictures'));
        } else {
            $pictures = Pictures::all()->orderByDesc('id')->paginate(40);
            return view('frontend.gallery', compact('pictures'));
        }
    }

    public function getFilteredSpots(Request $request)
    {
        $idpays = $request->get('idpays');
        $maps_ids = $request->get('maps_id', []);
        $query = Spots::select('id', 'name', 'lng', 'lat', 'imgpanosmall', 'imgsquaresmall', 'typepoint_id')
            ->where('pays_id', $idpays)
            ->where('actif', 1);

        if (!empty($maps_ids)) {
            $maps_ids_array = explode(',', $maps_ids);
            $query->whereIn('maps_id', $maps_ids_array);
        }

        $spots = $query->get();
        return response()->json($spots);
    }

    public function thingsToDo($country, Request $request)
    {
        // Assurez-vous que la langue est définie
        $locale = app()->getLocale();

        // Récupérer le point de départ pour le pays donné
        $defaultSpot = DB::table('default_spots')->where('pays_id', $country)->first();

        if (!$defaultSpot) {
            abort(404, 'Default spot not found for this country.');
        }

        // Récupérer les spots pour le pays donné avec les traductions
        $spots = Spots::where('pays_id', $country)
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

        // Pagination après le tri
        $perPage = 30;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $sortedSpots->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedSpots = new LengthAwarePaginator($currentItems, $sortedSpots->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        // Récupérer les types de spots pour les cases à cocher


        return view('frontend.things-to-do', compact('paginatedSpots', 'locale', 'country'));
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
