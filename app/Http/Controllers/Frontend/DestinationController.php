<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Pays;
use App\Models\Spots;
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
        // Chargement un maximum de 1000 points // Rechargement sur zoom uniquement si ce chiffre est atteint
        // Choix du mode

        // Chargement des photos de la carte
        // Chargement des images par page
        return view('frontend/destination', compact('idpays', 'markers', 'pays', 'payslist', 'payslng', 'payslat', 'payszoom', 'paysoffset', 'spot'));
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

    public function thewall($idpays)
    {
        $spots = Spots::select('id', 'name', 'imgsquaresmall')
            ->where('pays_id', $idpays)->inRandomOrder()->where('actif', 1)->get();


        $pays = Pays::where('pays_id', $idpays)->first();

        return view('frontend/thewall', compact('spots', 'idpays', 'pays'));
    }
}
