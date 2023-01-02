<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Pays;
use App\Models\Spots;
use App\Models\Circuits;
use App\Models\Circuits_details;

use App\Models\Default_spots;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Frontend\IndexController as FrontendIndexController;

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
            ->where('pays_id', $idpays)->where('actif', 1)->get();

        $payslist = Pays::where('actif', '=', 1)->orderBy('pays', 'asc')->get();

        // Un user est t'il connecté
        $userid = Auth::user();
        if ($userid) {
            $iduser = $userid->id;
            //  Chargement des circuit de cet user pour ce pays
            $circuits = Circuits::where('user_id', '=', $userid->id)->where('pays_id', '=', $idpays)->get();
            $nbcircuit = ($circuits->count());
    
            // Si pas de cictuit en créer un
            if ($nbcircuit == 0)
            {
                $circuit = new Circuits();
               
                $circuit->user_id = $iduser;
                $circuit->pays_id = $idpays;
                $circuit->titrecircuit =  $pays->pays;
                $circuit->save();

               

                // Inserer le point par defaut
                $idspotdefaut = Default_spots::where('pays_id','=',$idpays)->first()->spot_id;
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



            } 
            else
             {
                // Plusieurs circuits possibles
                // si un circuit est actif pour ce pays on le choisi
                // Sinon on prend el premier pour ce pays
                if (Session::get('circuitactif')) 
                {
                    $circuitatester = Session::get('circuitactif');
                    // verififie qu'il est dans le pays en cours
                    $existe = Circuits::where('user_id','=',$iduser)->where('pays_id','=',$idpays)->where ('id','=',$circuitatester)->count();
                    // si le circuit actif est dans le bon pays on valide
                    if ($existe == 1)
                      // on valide ce circuit comme actif
                    {
                        $circuitactif = $circuitatester;   
                    }
                        else
                        // on prend le premier circuit du nouveau pays
                    {
                        $premiercircuit = Circuits::where('user_id','=',$iduser)->where('pays_id','=',$idpays)->first();
                        Session::put('circuitactif', $premiercircuit->id);
                        $circuitactif = $premiercircuit->id;
                    }    
                }
                else // pas de circuit actif pour le moment on prend le premier
                { 
                    $premiercircuit = Circuits::where('user_id','=',$iduser)->where('pays_id','=',$idpays)->first();
                    Session::put('circuitactif', $premiercircuit->id);
                    $circuitactif = $premiercircuit->id;
                }
    

             }        

        } else {
            $circuits = null;
            $circuitactif = 0;
        }
       
        return view('frontend/destination', compact('idpays', 'markers', 'pays', 'payslist', 'payslng', 'payslat', 'payszoom', 'paysoffset', 'spot', 'circuits','circuitactif'));
    }

    public function listmarkers($idpays, $nelat, $nelng, $swlat, $swlng)
    {

        $markers = Spots::select('id', 'name', 'lng', 'lat', 'imgpanosmall', 'imgsquaresmall')
            ->where('lat', '<', $nelat)
            ->where('lat', '>', $swlat)
            ->where('lng', '<', $nelng)
            ->where('lng', '>', $swlng)
            ->where('pays_id', $idpays)
            ->where('actif', 1)
            ->get()->toJson();

        return response($markers, 200);
    }
    
    public function pictures($idspot)
    {
        $spot = Spots::where('id','=',$idspot)->first();
        return view('frontend/pictures', compact('spot'));
    }
    public function addtour($idspot,$idcircuit=null)
    {
         // Determiner l'id du user
         $thisuser = Auth::user();
         if ($thisuser)
         {

            $iduser = $thisuser->id;
                //Chargement du spot en cours
                $spot = Spots::where('id','=',$idspot)->first();
                if (is_null($spot))
                {
                    return back()->with('message', 'error spot');
                }
                $idpays = $spot->pays_id;

            // Verification du circuit
               $circuit = Circuits::where('user_id','=',$iduser)->where("pays_id","=",$idpays)->where('id','=',$idcircuit)->first();

                // verification que le spot n'est pas deja inscrit dans ce circuit
                // Creation du spot dans le circuit
        

         }
         else
         {
            return view('login'); 
         }
        
        return back()->with('message', 'spot ajouté');
    }

    public function thewall($idpays,$tri = null,$size= null)
    {


        if (is_null($size))
        {
            $imagesize = 'imgsquaresmall';
        }
        else
        {
            $imagesize = 'imgpanosmall';
        }

        if (is_null($tri))
        {
            $tri = 1;
        }

        if ($tri == 1)
        {
            $spots = Spots::select('id', 'name', $imagesize)
            ->where('pays_id', $idpays)->inRandomOrder()->where('actif', 1)->get();
        }
        elseif ($tri == 2)
        {
            $spots = Spots::select('id', 'name', $imagesize)
            ->where('pays_id', $idpays)->orderBy('name','asc')->where('actif', 1)->get(); 
        }
        elseif ($tri == 3)
        {
            $spots = Spots::select('id', 'name', $imagesize)
            ->where('pays_id', $idpays)->orderBy('created_at','desc')->where('actif', 1)->get();
        }
        


        $pays = Pays::where('pays_id', $idpays)->first();

        return view('frontend/thewall', compact('spots', 'idpays', 'pays'));
    }
}
