<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Pays;
use App\Models\Spots;
use App\Models\Circuits;
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
            //  Chargement des circuit de cet user pour ce pays
            $circuits = Circuits::where('user_id', '=', $userid->id)->where('pays_id', '=', $idpays)->get();
        } else {
            $circuits = null;
        }




        return view('frontend/destination', compact('idpays', 'markers', 'pays', 'payslist', 'payslng', 'payslat', 'payszoom', 'paysoffset', 'spot', 'circuits'));
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
