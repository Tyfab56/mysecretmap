<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Pays;
use App\Models\User;
use App\Models\Spots;
use App\Models\Pictures;
use App\Models\Circuits;
use App\Models\Noscircuits;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
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

        // Liste des dernier spots
        $lastspots = Spots::orderBy('created_at', 'desc')->where('actif', '=', 1)->take(18)->get();

        $pays = Pays::where('pays_id', '=', $idpays)->first();


        $payslat = $pays->lat;
        $payslng = $pays->lng;
        $payszoom = $pays->zoom;
        $paysoffset = $pays->offset;

        // Chargement des markers de la carte
        $markers = Spots::select('id', 'name', 'lng', 'lat', 'imgpanosmall', 'imgsquaresmall', 'typepoint_id')
            ->where('pays_id', $idpays)->where('actif', 1)->get();

        // récupération des circuits pour ce pays par defaut
        $circuits = NosCircuits::where('pays_id', $idpays)->orderBy('rang')->get();

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

        return view('frontend/index', compact('lastPays', 'idpays', 'markers', 'pays', 'payslist', 'payslng', 'payslat', 'payszoom', 'paysoffset', 'spot', 'lastspots', 'circuits'));
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

        // Liste des dernier spots
        $lastspots = Spots::orderBy('created_at', 'desc')->where('actif', '=', 1)->take(18)->get();

        return view('frontend/index', compact('lastPays', 'idpays', 'markers', 'payslist', 'pays', 'payslng', 'payslat', 'payszoom', 'paysoffset', 'spot','lastspots'));
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
                'img' => 'image|mimes:jpeg,jpg|max:20048',
            ]
        );

        $iduser = Auth::id();
        $spotid = $request->spotid;
        $spot = Spots::where('id', '=', $spotid)->first();
        $paysid = $spot->pays_id;
        $file = $request->file('img');




        if ($file == null) {
            // pas de nouvelle image
            $imagestatus = 0;
        } else {
            $extension = $file->getClientOriginalExtension();
            $imgname =  $request->file('img')->getClientOriginalName();;
            $imgname = str_replace(' ', '-', $imgname);
            $imgname = uniqid() . "_" . $iduser . "_" . $request->payslist . "_" . $imgname;

            $disk = Storage::disk('wasabi');
            $bucket = 'mysecretmap';

            // STOCKAGE IMAGE ORIGINALE


            [$width, $height] = getimagesize($file);
            $canvas = Image::canvas($width, $height);
            $imagefinale  = Image::make($file);

            $canvas->insert($imagefinale, 'center');
            $canvas->encode($extension);

            $disk->put('/large/large-' . $imgname, (string) $canvas, 'public');
            $largename = $disk->url('large/large-' . $imgname);

            // STOCKAGE IMAGE MEDIUM
            $mh = $height;
            $mw = $width;

            if ($mw > $mh) {
                $width = 600;
                $height = round((600 * $mh) / $mw);
            } else {
                $height = 600;
                $width = round((600 * $mw) / $mh);
            }
            $canvas = Image::canvas($width, $height);
            $imagemediumfinale  = Image::make($file)->resize(
                $width,
                $height,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $canvas->insert($imagemediumfinale, 'center');
            $canvas->encode($extension);
            $disk->put('/medium/medium-' . $imgname, (string) $canvas, 'public');
            $mediumname = $disk->url('medium/medium-' . $imgname);

            // STOCKAGE IMAGE SMALL
            if ($mw > $mh) {
                $width = 130;
                $height = round((130 * $mh) / $mw);
            } else {
                $height = 130;
                $width = round((130 * $mw) / $mh);
            }

            $canvas = Image::canvas($width, $height);
            $imagesmallfinale  = Image::make($file)->resize(
                $width,
                $height,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $canvas->insert($imagesmallfinale, 'center');
            $canvas->encode($extension);
            $disk->put('/small/small-' . $imgname, (string) $canvas, 'public');
            $smallname = $disk->url('small/small-' . $imgname);

            // MEMORISATION BD

            $picture = new Pictures();
            $picture->fichier = $imgname;
            $picture->user_id = $iduser;
            $picture->spot_id = $spotid;
            $picture->pays_id = $paysid;
            $picture->bucket = $bucket;
            $picture->width = $mw;
            $picture->height = $mh;
            $picture->actif = 1;
            $picture->large = $largename;
            $picture->medium = $mediumname;
            $picture->small =  $smallname;
            $picture->created_at = Carbon::now();
            $picture->updated_at = Carbon::now();
            $picture->save();
        }


        return \Redirect::route('addimagespot', $spotid);
    }

    public function addimagespot($spotid)
    {
        // Selectionne les infos du spot
        $spot = Spots::where('id', '=', $spotid)->first();
        // comptage des images total pour ce spot
        $spottotalcount = Pictures::where('spot_id', '=', $spotid)->where('actif', '=', 1)->where('user_id', '=', auth()->user()->id)->count();
        $pictures = Pictures::where('user_id', '=', auth()->user()->id)->where('spot_id', '=', $spotid)->where('actif', '=', 1)->paginate(20);
        return view('frontend/addimagespot', compact('spot', 'spottotalcount', 'pictures'));
    }

    public function delimagespot($id)
    {
        $picture = Pictures::where('id', '=', $id)->first();

        // Suppression des images
        $bucket = $picture->bucket;
        $disk = Storage::disk('wasabi');
        $filesmall = parse_url($picture->small);
        $filemedium = parse_url($picture->medium);
        $filelarge = parse_url($picture->large);

        //return $file_path['path'];


        $disk->delete($filesmall);
        $disk->delete($filemedium);
        $disk->delete($filelarge);


        Pictures::where('id', $id)->delete();
        return back()->with('message', 'Image supprimée');
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
