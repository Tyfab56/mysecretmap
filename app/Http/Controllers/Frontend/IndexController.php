<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Pays;
use App\Models\User;
use App\Models\Spots;
use App\Models\Pictures;
use App\Models\Features;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class IndexController extends Controller
{
    public function index($id = null, $spotid = null)
    {
        if (Session::get('lastPays')) {
            $lastPays = Session::get('lastPays');
            Session::forget('lastPays');
        } else {
            $lastPays = 'IS';
            Session::put('lastPays', 'IS');
        }


        if (!is_null($id)) {
            $idpays = $id;
        } else {
            $idpays = $lastPays;
        }



        $pays = Pays::where('pays_id', '=', $idpays)->first();


        $payslat = $pays->lat;
        $payslng = $pays->lng;
        $payszoom = $pays->zoom;
        $paysoffset = $pays->offset;

        // Chargement des markers de la carte
        $markers = Spots::select('id', 'name', 'lng', 'lat', 'imgpanosmall', 'imgsquaresmall', 'typepoint_id')
            ->where('pays_id', $idpays)->where('actif', 1)->get();

        $payslist = Pays::where('actif', '=', 1)->orderBy('pays', 'asc')->get();



        // Determination du spot par defaut
        if (!is_null($spotid)) {
            $spot = Spots::where('id', '=', $spotid)
                ->where('pays_id', '=', $idpays)->first();
            if (is_null($spot)) {

                return redirect()->route('home');
            }
        } else {
            $spot = null;
        }



        return view('frontend/index', compact('lastPays', 'idpays', 'markers', 'pays', 'payslist', 'payslng', 'payslat', 'payszoom', 'paysoffset', 'spot'));
    }


    public function godestination(Request $request)
    {
        $idpays = $request->idpays;
        Session::put('lastPays', $idpays);
        $lastPays = $idpays;

        $pays = Pays::where('pays_id', '=', $idpays)->first();
        if (is_null($pays)) {
            return redirect()->route('home');
        }
        $payslat = $pays->lat;
        $payslng = $pays->lng;
        $payszoom = $pays->zoom;
        $paysoffset = $pays->offset;
        $spot = null;
        // Gestion des selections en session

        $markers = Spots::select('id', 'name', 'lng', 'lat', 'imgpanosmall', 'imgsquaresmall', 'typepoint_id')
            ->where('pays_id', $idpays)->where('actif', 1)->get();
        $payslist = Pays::where('actif', '=', 1)->orderBy('pays', 'asc')->get();

        return view('frontend/index', compact('lastPays', 'idpays', 'markers', 'payslist', 'pays', 'payslng', 'payslat', 'payszoom', 'paysoffset', 'spot'));
    }

    public function nextdestinations()
    {
        return view('frontend/nextdestinations');
    }

    public function myaccount()
    {
        return view('frontend/myaccount');
    }

    public function addimagespotstore(Request $request)
    {
        $validatedData = $request->validate(
            [
                'img' => 'image|mimes:jpeg,jpg|max:10048',
            ]
        );

        $iduser = Auth::id();
        $spotid = $request->spotid;
        $file = $request->file('img');
        if ($file == null) {
            // pas de nouvelle image
            $imagestatus = 0;
        } else {
            $extension = $file->getClientOriginalExtension();
            $imgname =  $request->file('img')->getClientOriginalName();;
            $imgname = str_replace(' ', '-', $imgname);
            $imgname = uniqid() . "_" . $iduser . "_" . $request->payslist . "_" . $imgname;

            $disk = Storage::disk('s3');
            $bucket = 'mysecretmap';
            $upload_file = $request->file('img');

            // STOCKAGE IMAGE ORIGINALE

            $height = Image::make($upload_file)->height();
            $width = Image::make($upload_file)->width();
            $canvas = Image::canvas($width, $height);




            $imagefinale  = Image::make($file)->resize(
                $width,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );

            $canvas->insert($imagefinale, 'center');
            $canvas->encode($extension);

            $disk->put('/large/large-' . $imgname, (string) $canvas, 'public');
            $largename = $disk->url('large/large-' . $imgname);

            // STOCKAGE IMAGE MEDIUM

            // STOCKAGE IMAGE SMALL


            // MEMORISATION BD

            $picture = new Pictures();
            $picture->fichier = $imgname;
            $picture->bucket = $bucket;
            $picture->large = $largename;
            $picture->created_at = Carbon::now();
            $picture->updated_at = Carbon::now();
            $picture->save();
        }

        $spot = Spots::where('id', '=', $spotid)->first();
        return view('frontend/addimagespot', compact('spot'));
    }

    public function addimagespot($spotid)
    {
        // Selectionne les infos du spot
        $spot = Spots::where('id', '=', $spotid)->first();
        // comptage des images total pour ce spot
        $spottotalcount = Pictures::where('spot_id', '=', $spotid)->where('actif', '=', 1)->where('user_id', '=', auth()->user()->id)->count();
        return view('frontend/addimagespot', compact('spot', 'spottotalcount'));
    }

    public function whatsnext()
    {
        return view('frontend/whatsnext');
    }

    public function tourism()
    {
        return view('frontend/tourism');
    }

    public function photographers()
    {
        return view('frontend/photographers');
    }
    public function medias()
    {
        return view('frontend/medias');
    }

    public function benefits()
    {
        return view('frontend/benefits');
    }

    public function contact()
    {
        return view('frontend/contact');
    }

    public function aboutus()
    {
        return view('frontend/aboutus');
    }

    public function UserLogout()
    {
    }

    public function spot($id)
    {
    }
}
