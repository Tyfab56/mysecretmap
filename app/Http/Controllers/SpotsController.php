<?php

namespace App\Http\Controllers;

use App\Models\Pays;
use App\Models\User;
use App\Models\Langs;
use App\Models\Spots;
use App\Models\Distances;
use App\Models\Maps;
use App\Models\Region;
use App\Models\PendingPicture;
use App\Models\Typepoint;
use App\Models\MediasSpotApp;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use function GuzzleHttp\Promise\exception_for;
use FFMpeg;

class SpotsController extends Controller
{

    // Liste les spot sur la premiere page en fonction du type de marqueurs (maps)
    public function filter(Request $request)
    {
        $maps = Maps::get();

        if (is_null($request->maps)) {
            $map = 1;
        } else {
            $map = $request->maps;
        }


        // Liste les spots
        $payslist = Pays::where('actif', '=', 1)->orderBy('pays', 'asc')->get();

        if (is_null($request->pays)) {
            $pays = null;
        } else {
            $pays = $request->pays;
        }

        $users = User::where('admin', '=', 1)->get();
        if (is_null($request->search)) {
            $spots = Spots::orderBy('id', 'desc')->where('maps_id', '=', $map)->where('pays_id', '=', $pays)->paginate(15);
        } else {
            $spots = Spots::orderBy('id', 'desc')->where('maps_id', '=', $map)->where('pays_id', '=', $pays)->where('name', 'LIKE', "%{$request->search}%")->paginate(15);
        }

        // Liste les type de maps
        $maps = Maps::get();


        return view('admin.spots', compact('payslist', 'pays', 'users', 'spots', 'map', 'maps'));
    }
    public function index()
    {
        $maps = Maps::get();
        $map = 1;



        // Liste les spots
        $payslist = Pays::where('actif', '=', 1)->orderBy('pays', 'asc')->get();
        $pays = 'IS';


        $users = User::where('admin', '=', 1)->get();
        $spots = Spots::orderBy('id', 'desc')->where('maps_id', '=', $map)->where('pays_id', '=', $pays)->paginate(15);

        // Liste les type de maps
        $maps = Maps::get();


        return view('admin.spots', compact('payslist', 'pays', 'users', 'spots', 'map', 'maps'));
    }

    public function edit($id, $lang = null)
    {
        $spot = Spots::where('id', '=', $id)->first();

        $regions = Region::where('pays_id', $spot->pays_id)->get();

        $timeonsite = gmdate("H:i", $spot->timeonsite);
        $randotime = gmdate("H:i", $spot->randotime);
        $pays = Pays::where('actif', '=', 1)->orderBy('pays', 'asc')->get();
        $langs = Langs::where('actif', '=', 1)->orderBy('libelle', 'asc')->get();
        // Spot précedent
        $previousspot = Spots::where('id', '<', $spot->id)->orderBy('id', 'desc')->first();
        // Spot suivant
        $nextspot = Spots::where('id', '>', $spot->id)->orderBy('id')->first();

        $typepoints = Typepoint::all();
        Session::put('typeaction', 'edit');

        if (!empty($lang)) {
            $spotlang = $lang;
        } else {
            $spotlang = app()->getLocale();
        }

        // Liste les type de maps
        $maps = Maps::get();

        // Récupérer les médias associés à ce spot
        $medias = MediasSpotApp::where('spot_id', $id)->orderBy('media_rank', 'asc')->get();


        return view('admin.addspot', compact('spot', 'langs', 'pays', 'typepoints', 'timeonsite', 'randotime', 'spotlang', 'previousspot', 'nextspot', 'maps', 'regions', 'medias'));
    }
    public function social($id)
    {
        $spot = Spots::where('id', '=', $id)->first();
        return view('admin.social', compact('spot'));
    }

    public function delete($id)
    {
        $spot = Spots::where('id', '=', $id)->first();
        Session::put('typeaction', 'delete');
        // Suppression de infos sur ce point
        // Suppression des images
        $bucket = $spot->bucket;
        $disk = Storage::disk('wasabi');
        $filesmall = parse_url($spot->imgpanosmall);
        $filemedium = parse_url($spot->imgpanomedium);
        $filelarge = parse_url($spot->imgpanolarge);

        //return $file_path['path'];


        $disk->delete($filesmall);
        $disk->delete($filemedium);
        $disk->delete($filelarge);


        Spots::where('id', $id)->delete();
        return back()->with('message', 'Spot supprimé');
    }



    public function latlng($id, $lat, $lng)
    {

        // Insertion et retour vers la fiche avec refresh de la table
        Spots::where('id', $id)->update(['lat' => $lat, 'lng' => $lng]);
        return back()->with('message', 'Cordonnées mise à jour');
    }


    public function addSpot()
    {
        // Liste des pays
        $pays = Pays::where('actif', '=', 1)->orderBy('pays', 'asc')->get();
        $selectedPays = $pays->first();
        $regions = Region::where('pays_id', $selectedPays->pays_id)->get();
        $langs = Langs::where('actif', '=', 1)->orderBy('libelle', 'asc')->get();

        $timeonsite = "00:00";
        $randotime = "00:00";
        $spot = new Spots();
        $spot->lat = 0;
        $spot->lng = 0;
        $spot->latparking = 0;
        $spot->lngparking = 0;
        $typepoints = Typepoint::all();
        Session::put('typeaction', 'add');

        if (!empty($lang)) {
            $spotlang = $lang;
        } else {
            $spotlang = app()->getLocale();
        }
        // Liste

        // Liste les type de maps
        $maps = Maps::get();

        return view('admin.addspot', compact('spot', 'pays', 'typepoints', 'timeonsite', 'randotime', 'langs', 'spotlang', 'maps', 'regions'));
    }


    public function spotTextStore(Request $request)
    {
        $id = Auth::id();
        $typeaction = session::get('typeaction');

        if ($typeaction == "edit") {
            $spotid = $request->spotid;
            $spot = Spots::where('id', '=', $spotid)->first();
        } else {
            $spot = new Spots();
        };



        $lang = $request->langlist;

        $spot->translateOrNew($lang)->description = $request->description;
        $spot->translateOrNew($lang)->accessibilite = $request->accessibilite;
        $spot->translateOrNew($lang)->chemin = $request->chemin;
        $spot->translateOrNew($lang)->drone = $request->drone;
        $spot->translateOrNew($lang)->lumiere = $request->lumiere;
        $spot->translateOrNew($lang)->secretspot = $request->secretspot;
        $spot->translateOrNew($lang)->guidetext = $request->guidetext;
        $spot->translateOrNew($lang)->moreguidetext = $request->moreguidetext;
        $spot->translateOrNew($lang)->video1 = $request->video1;
        $spot->translateOrNew($lang)->videoapp = $request->videoapp;
        $spot->translateOrNew($lang)->blog = $request->blog;
        $spot->save();
        return back()->with('message', 'Texte modifié');
    }


    // Mémoriser les informations sur ce spot
    public function spotStore(Request $request)
    {



        // Controle du formulaire
        $validatedData = $request->validate(
            [
                'payslist' => 'required',
                'typespotlist' => 'required',
                'titre' => 'required',
                'lat' => 'required',
                'lng' => 'required',
                'maplist' => 'required',
                'region_id' => 'nullable|exists:regions,id',
                'imgpano' => 'image|mimes:jpeg,jpg,webp|max:10048',
                'imgsquare' => 'image|mimes:jpeg,jpg,webp|max:10048',
                'img360' => 'image|mimes:jpeg,jpg,webp|max:10048',
                'imgregion' => 'image|mimes:jpeg,jpg,webp|max:10048',
                'imgmap' => 'image|mimes:jpeg,jpg,webp|max:10048',
                'imgzoom' => 'image|mimes:jpeg,jpg,webp|max:10048',

            ]
        );


        $id = Auth::id();
        $typeaction = session::get('typeaction');

        // Numero du spot en modification
        if ($typeaction == "edit") {
            $spotid = $request->spotid;
        } else {
            $spotid = 0;
        }





        // Si spotid existe rechercher les informations
        $spotinfo = Spots::where('id', '=', $spotid)->first();



        // Verifier que l'emplacement du parking n'a pas changé

        if (is_null($spotinfo)) {
            $latparking = 0;
        } else {
            $latparking = $spotinfo->latparking;
        }


        // traitement du temps sur site
        list($hours, $mins) = explode(':', $request->timeonsite);
        $timeonsite = mktime($hours, $mins, 0) - mktime(0, 0, 0);

        list($hours, $mins) = explode(':', $request->randotime);
        $randotime = mktime($hours, $mins, 0) - mktime(0, 0, 0);

        $actif = $request->has('actif');
        $payant = $request->has('payant');
        $audioguide = $request->has('audioguide');

        // traitement de imgpano
        // Test existence d'une nouvelle image

        $file = $request->file('imgpano');
        $file360 = $request->file('img360');
        $filesquare = $request->file('imgsquare');
        $fileregion = $request->file('imgregion');
        $filemap = $request->file('imgmap');
        $filezoom = $request->file('imgzoom');
        $filepeak = $request->file('imgpeak');
        $videomap = $request->file('videomap');

        // Traitement image panoramique
        if ($file == null) {
            // pas de nouvelle image
            $imagestatus = 0;
        } else {
            // Recherche si ancienne image et suppression des images coorespondantes

            if ($typeaction == "edit") {
                if ($spotinfo->imgpanosmall) {
                    $bucket = $spotinfo->bucket;
                    $disk = Storage::disk('wasabi');
                    $filesmall = parse_url($spotinfo->imgpanosmall);
                    $filemedium = parse_url($spotinfo->imgpanomedium);
                    $filelarge = parse_url($spotinfo->imgpanolarge);
                    $disk->delete($filesmall);
                    $disk->delete($filemedium);
                    $disk->delete($filelarge);
                }
            }
            // nouvelle image
            $imagestatus = 1;
            $extension = $file->getClientOriginalExtension();
            $imgpanoname =  $request->file('imgpano')->getClientOriginalName();;
            $imgpanoname = str_replace(' ', '-', $imgpanoname);
            $imgpanoname = uniqid() . "_" . $id . "_" . $request->payslist . "_" . $imgpanoname;


            $disk = Storage::disk('wasabi');
            $bucket = 'mysecretmap';

            // LARGE
            // Stockage d'une image large 1100 x 366
            $width = 1100;
            $height = 366;
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

            $disk->put('/large/large-' . $imgpanoname, (string) $canvas, 'public');
            $largename = $disk->url('large/large-' . $imgpanoname);


            // MEDIUM
            // Stockage d'un thumb 408x136
            $width = 408;
            $height = 136;
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

            $disk->put('/medium/medium-' . $imgpanoname, (string) $canvas, 'public');
            $mediumname = $disk->url('medium/medium-' . $imgpanoname);
            // SMALL
            // Stockage d'une vignette 130x43
            $width = 130;
            $height = 43;
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
            $disk->put('/small/small-' . $imgpanoname, (string) $canvas, 'public');
            $smallname = $disk->url('small/small-' . $imgpanoname);
        }
        // traitement image carré
        if ($filesquare == null) {
            // pas de nouvelle image
            $imagesquarestatus = 0;
        } else {
            // Recherche si ancienne image et suppression des images coorespondantes

            if ($typeaction == "edit") {
                if ($spotinfo->imgsquaresmall) {
                    $bucket = $spotinfo->bucket;
                    $disk = Storage::disk('wasabi');
                    $filesmall = parse_url($spotinfo->imgsquaresmall);
                    $filemedium = parse_url($spotinfo->imgsquaremedium);
                    $filelarge = parse_url($spotinfo->imgsquarelarge);
                    $disk->delete($filesmall);
                    $disk->delete($filemedium);
                    $disk->delete($filelarge);
                }
            }
            // nouvelle image
            $imagesquarestatus = 1;
            $extension = $filesquare->getClientOriginalExtension();
            $imgsquarename =  $request->file('imgsquare')->getClientOriginalName();;
            $imgsquarename = str_replace(' ', '-', $imgsquarename);
            $imgsquarename = uniqid() . "_" . $id . "_" . $request->payslist . "_" . $imgsquarename;


            $disk = Storage::disk('wasabi');
            $bucket = 'mysecretmap';

            // LARGE
            // Stockage d'une image large 1100 x 366
            $width = 1100;
            $height = 1100;
            $canvas = Image::canvas($width, $height);

            $imagefinale  = Image::make($filesquare)->resize(
                $width,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );

            $canvas->insert(
                $imagefinale,
                'center'
            );
            $canvas->encode($extension);

            $disk->put('/large/large-' . $imgsquarename, (string) $canvas, 'public');
            $largesquarename = $disk->url('large/large-' . $imgsquarename);


            // MEDIUM
            // Stockage d'un thumb 408x136
            $width = 408;
            $height = 408;
            $canvas = Image::canvas($width, $height);

            $imagefinale  = Image::make($filesquare)->resize(
                $width,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );

            $canvas->insert(
                $imagefinale,
                'center'
            );
            $canvas->encode($extension);

            $disk->put('/medium/medium-' . $imgsquarename, (string) $canvas, 'public');
            $mediumsquarename = $disk->url('medium/medium-' . $imgsquarename);
            // SMALL
            // Stockage d'une vignette 130x43
            $width = 130;
            $height = 130;
            $canvas = Image::canvas($width, $height);

            $imagefinale  = Image::make($filesquare)->resize(
                $width,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );

            $canvas->insert(
                $imagefinale,
                'center'
            );
            $canvas->encode($extension);
            $disk->put('/small/small-' . $imgsquarename, (string) $canvas, 'public');
            $smallsquarename = $disk->url('small/small-' . $imgsquarename);
        }

        // traitement image 360  ////////////////////////////////////////////////////////////////////////
        if ($file360 == null) {
            // pas de nouvelle image
            $image360status = 0;
        } else {
            // Recherche si ancienne image et suppression des images correspondantes

            if ($typeaction == "edit" && $spotinfo->img360) {
                $disk = Storage::disk('wasabi');
                $filelarge = parse_url($spotinfo->img360, PHP_URL_PATH);
                $disk->delete($filelarge);
            }

            // Nouvelle image
            $image360status = 1;
            $img360name = $request->file('img360')->getClientOriginalName();
            $img360name = str_replace(' ', '-', $img360name);
            $img360name =  pathinfo($img360name, PATHINFO_FILENAME) . ".webp";

            $disk = Storage::disk('wasabi');
            $bucket = 'mysecretmap';

            // Convertir l'image en WebP avec une qualité de 20 %
            $imageWebP = Image::make($file360)->encode('webp', 20);

            // Stockage de l'image WebP sur S3 Wasabi
            $disk->put('360/' . $img360name, (string) $imageWebP, 'public');
            $large360name = $disk->url('360/' . $img360name);
        }
        // traitement image vue region
        if ($fileregion == null) {
            // pas de nouvelle image
            $imageregionstatus = 0;
        } else {
            // Recherche si ancienne image et suppression des images coorespondantes

            if ($typeaction == "edit") {
                if ($spotinfo->imgregionlarge) {
                    $bucket = $spotinfo->bucket;
                    $disk = Storage::disk('wasabi');

                    $filemedium = parse_url($spotinfo->imgregionmedium);
                    $filelarge = parse_url($spotinfo->imgregionlarge);

                    $disk->delete($filemedium);
                    $disk->delete($filelarge);
                }
            }
            // nouvelle image
            $imageregionstatus = 1;
            $extension = $fileregion->getClientOriginalExtension();
            $imgregionname =  $request->file('imgregion')->getClientOriginalName();;
            $imgregionname = str_replace(' ', '-', $imgregionname);
            $imgregionname = uniqid() . "_" . $id . "_" . $request->payslist . "_" . $imgregionname;


            $disk = Storage::disk('wasabi');
            $bucket = 'mysecretmap';

            // LARGE
            // Stockage d'une image large 1100 x 366
            $width = 1200;
            $height = 534;
            $canvas = Image::canvas($width, $height);

            $imagefinale  = Image::make($fileregion)->resize(
                $width,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );

            $canvas->insert(
                $imagefinale,
                'center'
            );
            $canvas->encode($extension);

            $disk->put('/large/large-' . $imgregionname, (string) $canvas, 'public');
            $largeregionname = $disk->url('large/large-' . $imgregionname);


            // MEDIUM
            // Stockage d'un thumb 408x136
            $width = 600;
            $height = 267;
            $canvas = Image::canvas($width, $height);

            $imagefinale  = Image::make($fileregion)->resize(
                $width,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );

            $canvas->insert(
                $imagefinale,
                'center'
            );
            $canvas->encode($extension);

            $disk->put('/medium/medium-' . $imgregionname, (string) $canvas, 'public');
            $mediumregionname = $disk->url('medium/medium-' . $imgregionname);
        }

        // traitement image carte globale
        if ($filemap == null) {
            // pas de nouvelle image
            $imagemapstatus = 0;
        } else {
            // Recherche si ancienne image et suppression des images coorespondantes

            if ($typeaction == "edit") {
                if ($spotinfo->imgmaplarge) {
                    $bucket = $spotinfo->bucket;
                    $disk = Storage::disk('wasabi');

                    $filemedium = parse_url($spotinfo->imgmapmedium);
                    $filelarge = parse_url($spotinfo->imgmaplarge);

                    $disk->delete($filemedium);
                    $disk->delete($filelarge);
                }
            }
            // nouvelle image
            $imagemapstatus = 1;
            $extension = $filemap->getClientOriginalExtension();
            $imgmapname =  $request->file('imgmap')->getClientOriginalName();;
            $imgmapname = str_replace(' ', '-', $imgmapname);
            $imgmapname = uniqid() . "_" . $id . "_" . $request->payslist . "_" . $imgmapname;


            $disk = Storage::disk('wasabi');
            $bucket = 'mysecretmap';

            // LARGE
            // Stockage d'une image large
            $width = 1200;
            $height = 534;
            $canvas = Image::canvas($width, $height);

            $imagefinale  = Image::make($filemap)->resize(
                $width,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );

            $canvas->insert(
                $imagefinale,
                'center'
            );
            $canvas->encode($extension);

            $disk->put('/large/large-' . $imgmapname, (string) $canvas, 'public');
            $largemapname = $disk->url('large/large-' . $imgmapname);


            // MEDIUM
            // Stockage d'un thumb
            $width = 600;
            $height = 267;
            $canvas = Image::canvas($width, $height);

            $imagefinale  = Image::make($filemap)->resize(
                $width,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );

            $canvas->insert(
                $imagefinale,
                'center'
            );
            $canvas->encode($extension);

            $disk->put('/medium/medium-' . $imgmapname, (string) $canvas, 'public');
            $mediummapname = $disk->url('medium/medium-' . $imgmapname);
        }

        // traitement image zoom
        if ($filezoom == null) {
            // pas de nouvelle image
            $imagezoomstatus = 0;
        } else {
            // Recherche si ancienne image et suppression des images coorespondantes

            if ($typeaction == "edit") {
                if ($spotinfo->imgzoomlarge) {
                    $bucket = $spotinfo->bucket;
                    $disk = Storage::disk('wasabi');

                    $filemedium = parse_url($spotinfo->imgzoommedium);
                    $filelarge = parse_url($spotinfo->imgzoomlarge);

                    $disk->delete($filemedium);
                    $disk->delete($filelarge);
                }
            }
            // nouvelle image
            $imagezoomstatus = 1;
            $extension = $filezoom->getClientOriginalExtension();
            $imgzoomname =  $request->file('imgzoom')->getClientOriginalName();
            $imgzoomname = str_replace(' ', '-', $imgzoomname);
            $imgzoomname = uniqid() . "_" . $id . "_" . $request->payslist . "_" . $imgzoomname;


            $disk = Storage::disk('wasabi');
            $bucket = 'mysecretmap';

            // LARGE
            // Stockage d'une image large
            $width = 1200;
            $height = 534;
            $canvas = Image::canvas($width, $height);

            $imagefinale  = Image::make($filezoom)->resize(
                $width,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );

            $canvas->insert(
                $imagefinale,
                'center'
            );
            $canvas->encode($extension);

            $disk->put('/large/large-' . $imgzoomname, (string) $canvas, 'public');
            $largezoomname = $disk->url('large/large-' . $imgzoomname);


            // MEDIUM
            // Stockage d'un thumb
            $width = 600;
            $height = 267;
            $canvas = Image::canvas($width, $height);

            $imagefinale  = Image::make($filezoom)->resize(
                $width,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );

            $canvas->insert(
                $imagefinale,
                'center'
            );
            $canvas->encode($extension);

            $disk->put('/medium/medium-' . $imgzoomname, (string) $canvas, 'public');
            $mediumzoomname = $disk->url('medium/medium-' . $imgzoomname);
        }

        // traitement image peak
        if ($filepeak == null) {
            // pas de nouvelle image
            $imagepeakstatus = 0;
        } else {
            // Recherche si ancienne image et suppression des images coorespondantes

            if ($typeaction == "edit") {
                if ($spotinfo->imgpeaklarge) {
                    $bucket = $spotinfo->bucket;
                    $disk = Storage::disk('wasabi');

                    $filemedium = parse_url($spotinfo->imgpeakmedium);
                    $filelarge = parse_url($spotinfo->imgpeaklarge);

                    $disk->delete($filemedium);
                    $disk->delete($filelarge);
                }
            }
            // nouvelle image
            $imagepeakstatus = 1;
            $extension = $filepeak->getClientOriginalExtension();
            $imgpeakname =  $request->file('imgpeak')->getClientOriginalName();
            $imgpeakname = str_replace(' ', '-', $imgpeakname);
            $imgpeakname = uniqid() . "_" . $id . "_" . $request->payslist . "_" . $imgpeakname;


            $disk = Storage::disk('wasabi');
            $bucket = 'mysecretmap';

            // LARGE
            // Stockage d'une image large
            $width = 1200;
            $height = 534;
            $canvas = Image::canvas($width, $height);

            $imagefinale  = Image::make($filepeak)->resize(
                $width,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );

            $canvas->insert(
                $imagefinale,
                'center'
            );
            $canvas->encode($extension);

            $disk->put('/large/large-' . $imgpeakname, (string) $canvas, 'public');
            $largepeakname = $disk->url('large/large-' . $imgpeakname);


            // MEDIUM
            // Stockage d'un thumb
            $width = 600;
            $height = 267;
            $canvas = Image::canvas($width, $height);

            $imagefinale  = Image::make($filepeak)->resize(
                $width,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );

            $canvas->insert(
                $imagefinale,
                'center'
            );
            $canvas->encode($extension);

            $disk->put('/medium/medium-' . $imgpeakname, (string) $canvas, 'public');
            $mediumpeakname = $disk->url('medium/medium-' . $imgpeakname);
        }

        // traitement video carte globale
        if ($videomap == null) {
            // pas de nouvelle image
            $videomapstatus = 0;
        } else {

            // Recherche si ancienne image et suppression des images coorespondantes

            if ($typeaction == "edit") {
                if ($spotinfo->videomap) {
                    $bucket = $spotinfo->bucket;
                    $disk = Storage::disk('wasabi');

                    $videomap = parse_url($spotinfo->videomap);
                    $disk->delete($videomap);
                }
            }


            // nouvelle image
            $videomapstatus = 1;

            $videomapname =  $request->file('videomap')->getClientOriginalName();;
            $videomapname = str_replace(' ', '-', $videomapname);
            $videomapname = uniqid() . "_" . $id . "_" . $request->payslist . "_" . $videomapname;


            $disk = Storage::disk('wasabi');
            $bucket = 'mysecretmap';

            // VIDEO
            // Stockage d'une video

            $disk->put('/large/large-' . $videomapname, file_get_contents($videomap), 'public');
            $videomapname = $disk->url('large/large-' . $videomapname);
        }


        if ($spotid == 0) {
            $spot = new Spots();
        } else {
            $spot = $spotinfo;
        }


        // Memorisation base de données
        $spot->name = $request->titre;
        $spot->slug = Str::slug($spot->country_code . '_' . $spot->name, '_');


        $spot->pays_id = $request->payslist;
        $spot->maps_id = $request->maplist;
        $spot->typepoint_id = $request->typespotlist;
        $spot->region_id = $request->region_id;
        $spot->timeonsite = $timeonsite;
        $spot->randotime = $randotime;
        $spot->lng = $request->lng;
        $spot->latparking = $request->latparking;
        $spot->lngparking = $request->lngparking;
        $spot->lat = $request->lat;
        $spot->userid = $id;
        $spot->actif = $actif;
        $spot->parkingpayant = $payant;
        $spot->audioguide = $audioguide;

        // Positionner updategps si la position à changé pour recalculer le trajet
        if (round($latparking <> 0)) {
            if ($latparking <> $request->latparking) {
                $spot->updategps = 1;
            }
        }


        // si nouvelle image mettre à jour les images
        if ($imagestatus == 1) {

            $spot->fichier = $imgpanoname;
            $spot->bucket = $bucket;
            $spot->imgpanosmall = $smallname;
            $spot->imgpanomedium = $mediumname;
            $spot->imgpanolarge = $largename;
        }

        if ($imagesquarestatus == 1) {
            $spot->bucket = $bucket;
            $spot->fichiersquare = $imgsquarename;
            $spot->imgsquaresmall = $smallsquarename;
            $spot->imgsquaremedium = $mediumsquarename;
            $spot->imgsquarelarge = $largesquarename;
        }

        if ($image360status == 1) {

            $spot->img360 = $large360name;
        }

        if ($imageregionstatus == 1) {
            $spot->bucket = $bucket;
            $spot->fichierregion = $imgregionname;
            $spot->imgvueregionmedium = $mediumregionname;
            $spot->imgvueregionlarge = $largeregionname;
        }

        if ($imagemapstatus == 1) {
            $spot->bucket = $bucket;
            $spot->fichiermap = $imgmapname;
            $spot->imgmapmedium = $mediummapname;
            $spot->imgmaplarge = $largemapname;
        }

        if ($imagezoomstatus == 1) {
            $spot->bucket = $bucket;
            $spot->fichierzoom = $imgzoomname;
            $spot->imgzoommedium = $mediumzoomname;
            $spot->imgzoomlarge = $largezoomname;
        }

        if ($imagepeakstatus == 1) {
            $spot->bucket = $bucket;
            $spot->fichierpeak = $imgpeakname;
            $spot->imgpeakmedium = $mediumpeakname;
            $spot->imgpeaklarge = $largepeakname;
        }

        if ($videomapstatus == 1) {
            $spot->bucket = $bucket;
            $spot->videomap = $videomapname;
        }
        // Fin mise à jour image

        // Si  typeaction = Add mettre à jour createdat
        if ($typeaction == 'add') {
            $spot->created_at = Carbon::now();
        }
        // Dans tous les cas mise à jour de updated_at
        $spot->updated_at = Carbon::now();
        $spot->save();
        // mise à jour du nombre de photos
        $count = Spots::where('pays_id', '=', $request->payslist)
            ->where('actif', '=', 1)
            ->count();



        // Insertion dans la table pays
        $pays = Pays::where('pays_id', '=', $request->payslist)->first();
        $pays->nbpic = $count;
        $pays->save();

        // Ajustement du message
        if ($typeaction == 'add') {
            return back()->with('message', 'Spot ajouté');
        } else {
            return back()->with('message', 'Spot modifié');
        }
    }

    public function submitPicture(Request $request)
    {
        $validatedData = $request->validate([
            'spotid' => 'required|integer',
            'file' => 'required|mimes:jpg,png,jpeg,gif,webp|max:2048',
        ]);

        $spotId = $request->input('spotid');
        $file = $request->file('file');

        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/pending_pictures', $filename);  // Stockage dans un dossier séparé pour les images en attente

        $pendingPicture = new PendingPicture([
            'user_id' => auth()->id(),
            'spot_id' => $spotId,
            'filename' => $filename,
        ]);
        $pendingPicture->save();

        return response()->json(['message' => 'Image uploaded and waiting for validation.']);
    }


    public function updateTranslations(Request $request, $spotId)
    {
        $spot = Spots::find($spotId);
        if (!$spot) {
            return response()->json(['message' => 'Spot not found'], 404);
        }

        $locale = $request->input('locale'); // La locale de la traduction
        $attribute = $request->input('attribute'); // L'attribut à mettre à jour
        $value = $request->input('value'); // La valeur traduite

        if (in_array($attribute, $spot->translatedAttributes)) {
            $spot->translateOrNew($locale)->$attribute = $value;
            $spot->save();

            return response()->json(['message' => 'Spot translation updated successfully']);
        }

        return response()->json(['message' => 'Invalid attribute'], 400);
    }


    public function search(Request $request)
    {
        $query = $request->get('query');
        $spots = Spots::where('name', 'LIKE', "%{$query}%")->get();

        $html = '';
        foreach ($spots as $spot) {
            $html .= '<option value="' . $spot->id . '">' . $spot->name . '</option>';
        }

        return response()->json(['html' => $html]);
    }

    public function searchbanner(Request $request)
    {
        $query = $request->input('q');

        $spots = Spots::where('name', 'like', "%{$query}%")->get();

        return response()->json($spots);
    }

    public function getGuideSpots(Request $request)
    {
        // Validate inputs for country code and language
        $request->validate([
            'country_code' => 'required|string|max:2',
            'lang' => 'required|string|max:2',
        ]);

        $countryCode = $request->input('country_code');
        $lang = $request->input('lang', 'en');

        // Query spots with related media, translations, and region translations
        $spots = Spots::with([
            'media' => function ($query) use ($lang) {
                $query->where(function ($q) use ($lang) {
                    $q->whereNull('id_lang')  // Media with no language specified (universal)
                        ->orWhere('id_lang', $lang); // Media specific to the requested language
                });
            },
            'translations' => function ($query) use ($lang) {
                $query->where('locale', $lang); // Fetch translations in the requested language
            },
            'region.translations' => function ($query) use ($lang) {
                $query->where('locale', $lang); // Fetch region translations in the requested language
            }
        ])
            ->where('pays_id', $countryCode)
            ->where('audioguide', 1)
            ->get();

        $lastUpdateDate = Spots::where('pays_id', $countryCode)
            ->where('audioguide', 1)
            ->max('updated_at');

        return response()->json([
            'map_update_date' => $lastUpdateDate,
            'spots' => $spots->map(function ($spot) use ($lang) {
                return [
                    'id' => $spot->id,
                    'name' => $spot->name,
                    'latitude' => $spot->lat,
                    'longitude' => $spot->lng,
                    'img360' => $spot->img360,
                    'randotime' => $spot->randotime,
                    'parking' => $spot->parkingpayant,
                    'timeonsite' => $spot->timeonsite,
                    'guidetext' => $spot->translations->first()->guidetext ?? null,
                    'videoapp' => $spot->translations->first()->videoapp ?? null,
                    'moreguidetext' => $spot->translations->first()->moreguidetext ?? null,
                    'media' => $spot->media->map(function ($media) {
                        return [
                            'type' => $media->media_type, // Could be 'photo', 'audio', or 'video'
                            'filename' => $media->media_filename,
                            'url'  => $media->media_url,
                            'description' => $media->media_description, // Optional description
                            'lang' => $media->id_lang, // Language of the media
                        ];
                    }),
                    'region' => $spot->region ? [
                        'id' => $spot->region->id,
                        'name' => $spot->region->translations->where('locale', $lang)->first()->name ?? $spot->region->name, // Fallback to the default name if no translation
                        'image_path' => $spot->region->image_path
                    ] : null,
                ];
            }),
        ]);
    }

    public function uploadGuideMedia(Request $request)
    {
        $validatedData = $request->validate([
            'spot_id' => 'required|exists:spots,id',
            'media_file' => 'required|file|mimes:jpeg,png,mp4,mp3,webp|max:20480',  // Un seul fichier
            'media_description' => 'nullable|string|max:191',
            'id_lang' => 'nullable|string|max:2',
        ]);

        $spotId = $request->input('spot_id');
        $file = $request->file('media_file');  // Un seul fichier récupéré
        $mediaDescription = $request->input('media_description', null);
        $idLang = $request->input('media_lang', null);

        // Déterminer le type de média (photo, vidéo, audio)
        $mediaType = $this->determineMediaType($file);

        // Traiter et télécharger en fonction du type de média
        if ($mediaType === 'photo') {
            $this->processAndUploadImage($file, $spotId, $mediaDescription, $idLang);
        } elseif ($mediaType === 'video') {
            $this->processAndUploadVideo($file, $spotId, $mediaDescription, $idLang);
        } elseif ($mediaType === 'audio') {
            $this->processAndUploadAudio($file, $spotId, $mediaDescription, $idLang);
        }

        // Retourner à la page d'appel après l'upload
        return redirect()->back()->with('message', 'Media uploaded successfully');
    }

    private function getNextMediaRank($spotId, $mediaType)
    {
        // Utiliser le modèle Mediasspotapp pour obtenir le rang le plus élevé
        $maxRank = MediasSpotApp::where('spot_id', $spotId)
            ->where('media_type', $mediaType)
            ->max('media_rank');

        return $maxRank ? $maxRank + 1 : 1;
    }

    private function processAndUploadImage($file, $spotId, $mediaDescription, $idLang)
    {
        // Charger l'image avec Intervention/Image
        $image = Image::make($file);

        // Dimensions cibles pour un ratio 16:9 (1920x1080)
        $targetWidth = 1920;
        $targetHeight = 1080;

        // Calculer le ratio de l'image originale
        $originalWidth = $image->width();
        $originalHeight = $image->height();
        $originalRatio = $originalWidth / $originalHeight;

        // Ratio 16/9 attendu
        $targetRatio = 16 / 9;

        // Décider quel côté redimensionner en fonction du ratio
        if ($originalRatio > $targetRatio) {
            $image->resize(null, $targetHeight, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        } else {
            $image->resize($targetWidth, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }

        // Crop pour obtenir exactement 1920x1440
        $image->crop($targetWidth, $targetHeight);

        // Nom du fichier basé sur le spot ID, type de média et horodatage
        $filename = $spotId . '_photo_' . time() . '.' . $file->getClientOriginalExtension();
        $path = 'mobile/' . $filename;

        // Upload sur Wasabi
        Storage::disk('wasabi')->put($path, (string) $image->encode(), 'public');

        // Enregistrer dans la base de données
        $this->storeMediaRecord($spotId, 'photo', Storage::disk('wasabi')->url($path), $filename, $mediaDescription, $idLang);
    }


    private function processAndUploadVideo($file, $spotId, $mediaDescription, $idLang)
    {
        $ffmpeg = FFMpeg\FFMpeg::create();
        $video = $ffmpeg->open($file->getRealPath());

        $filename = time() . '_' . $file->getClientOriginalName();
        $path = 'guidevideo/' . $filename;

        // Get video dimensions
        $videoStreams = $video->getStreams()->videos()->first();
        $width = $videoStreams->get('width');
        $height = $videoStreams->get('height');

        // Resize only if the video is not already 1920x1080
        if ($width !== 1920 || $height !== 1080) {
            $video->filters()->resize(new FFMpeg\Coordinate\Dimension(1920, 1080))->synchronize();
        }

        $video->save(new FFMpeg\Format\Video\X264(), storage_path('app/temp/' . $filename));

        // Upload to Wasabi
        Storage::disk('wasabi')->put($path, file_get_contents(storage_path('app/temp/' . $filename)), 'public');

        // Store the media record in the database
        $this->storeMediaRecord($spotId, 'video', Storage::disk('wasabi')->url($path), $filename, $mediaDescription, $idLang);
    }

    private function processAndUploadAudio($file, $spotId, $mediaDescription, $idLang)
    {
        $ffmpeg = FFMpeg\FFMpeg::create();
        $audio = $ffmpeg->open($file->getRealPath());

        $filename = time() . '_' . $file->getClientOriginalName();
        $path = 'mysecretmap/mobile/' . $filename;

        $audio->save(new FFMpeg\Format\Audio\Mp3(), storage_path('app/temp/' . $filename));

        // Upload sur Wasabi
        Storage::disk('wasabi')->put($path, file_get_contents(storage_path('app/temp/' . $filename)), 'public');

        // Stocker le média dans la base de données
        $this->storeMediaRecord($spotId, 'audio', Storage::disk('wasabi')->url($path), $filename, $mediaDescription, $idLang);
    }


    private function storeMediaRecord($spotId, $mediaType, $mediaUrl, $filename, $mediaDescription, $idLang)
    {
        // Calcul automatique du prochain rang disponible pour le média
        $mediaRank = $this->getNextMediaRank($spotId, $mediaType);

        // Enregistrement des informations dans la table 'mediasspotapp' via le modèle
        MediasSpotApp::create([
            'spot_id' => $spotId,
            'media_type' => $mediaType,
            'media_url' => $mediaUrl,
            'media_filename' => $filename,
            'media_description' => $mediaDescription,
            'media_rank' => $mediaRank,
            'id_lang' => $idLang,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function determineMediaType($file)
    {
        $mimeType = $file->getMimeType();

        if (str_contains($mimeType, 'image')) {
            return 'photo';
        } elseif (str_contains($mimeType, 'video')) {
            return 'video';
        } elseif (str_contains($mimeType, 'audio')) {
            return 'audio';
        }

        throw new \Exception('Unsupported media type');
    }
    public function moveMediaUp($mediaId)
    {
        // Trouver le média courant
        $media = MediasSpotApp::find($mediaId);

        if (!$media) {
            return redirect()->back()->with('error', 'Media not found');
        }

        // Trouver le média au-dessus
        $previousMedia = MediasSpotApp::where('spot_id', $media->spot_id)
            ->where('media_type', $media->media_type)
            ->where('media_rank', '<', $media->media_rank)
            ->orderBy('media_rank', 'desc')
            ->first();

        if ($previousMedia) {
            // Échanger les ranks
            $currentRank = $media->media_rank;
            $media->update(['media_rank' => $previousMedia->media_rank]);
            $previousMedia->update(['media_rank' => $currentRank]);
        }

        return redirect()->back()->with('message', 'Media moved up successfully');
    }
    public function moveMediaDown($mediaId)
    {
        // Trouver le média courant
        $media = MediasSpotApp::find($mediaId);

        if (!$media) {
            return redirect()->back()->with('error', 'Media not found');
        }

        // Trouver le média en dessous
        $nextMedia = MediasSpotApp::where('spot_id', $media->spot_id)
            ->where('media_type', $media->media_type)
            ->where('media_rank', '>', $media->media_rank)
            ->orderBy('media_rank', 'asc')
            ->first();

        if ($nextMedia) {
            // Échanger les ranks
            $currentRank = $media->media_rank;
            $media->update(['media_rank' => $nextMedia->media_rank]);
            $nextMedia->update(['media_rank' => $currentRank]);
        }

        return redirect()->back()->with('message', 'Media moved down successfully');
    }
    public function deleteGuideMedia($mediaId)
    {
        // Trouver le média à supprimer
        $media = MediasSpotApp::find($mediaId);

        if (!$media) {
            return redirect()->back()->with('error', 'Media not found');
        }

        // Supprimer le fichier du stockage Wasabi
        if (Storage::disk('wasabi')->exists('mobile/' . $media->media_filename)) {
            Storage::disk('wasabi')->delete('mobile/' . $media->media_filename);
        }

        // Supprimer le média de la base de données
        $spotId = $media->spot_id;
        $mediaType = $media->media_type;
        $media->delete();

        // Réorganiser les rangs des médias restants pour ce spot et ce type de média
        $this->adjustRanks($spotId, $mediaType);

        // Retourner à la page précédente avec un message de succès
        return redirect()->back()->with('message', 'Media deleted and ranks adjusted successfully');
    }
    private function adjustRanks($spotId, $mediaType)
    {
        // Récupérer tous les médias restants pour le spot et le type de média, triés par rang
        $medias = MediasSpotApp::where('spot_id', $spotId)
            ->where('media_type', $mediaType)
            ->orderBy('media_rank', 'asc')
            ->get();

        // Réorganiser les rangs de manière consécutive
        foreach ($medias as $index => $media) {
            $media->update(['media_rank' => $index + 1]);
        }
    }

    public function getNearbySpots(Request $request)
    {
        // Paramètres d'entrée : spotId, mode (distance ou temps), pays
        $spotId = $request->input('spotid');
        $mode = $request->input('mode', 't');
        if ($mode === 'd') {
            $mode = 'metres';
        } else {
            $mode = 'temps';
        }
        $limit = $request->input('nb', 10); // Par défaut, recherche par temps

        // Validation du spotId
        if (!$spotId) {
            return response()->json(['error' => 'spot_id est requis'], 200);
        }

        $spotOrigine = Spots::find($spotId);


        $countryCode = $spotOrigine->pays_id;

        // Récupérer les spots dans le pays spécifié et qui ont audioguide activé
        $spots = Spots::where('pays_id', $countryCode)
            ->where('audioguide', true)
            ->where('id', '!=', $spotId) // Exclure le spot d'origine
            ->get();


        $results = [];



        // Recherche des spots les plus proches en fonction de la distance ou du temps
        foreach ($spots as $spot) {


            // Chercher la distance et le temps entre le spot de l'utilisateur et le spot courant
            $distanceRecord = Distances::where('spot_origine', $spotOrigine->id)
                ->where('spot_destination', $spot->id)
                ->first(['metres', 'temps']);


            if ($distanceRecord) {

                $firstImage = MediasSpotApp::where('spot_id', $spot->id)
                    ->where('media_type', 'photo') // Assurez-vous de récupérer les images
                    ->orderBy('media_rank', 'asc') // Assurez-vous que la première image est celle de rang 1
                    ->first();

                // Ajouter l'image à la réponse
                $firstImageUrl = $firstImage ? $firstImage->media_filename : null;


                $value = ($mode === 'temps') ? $distanceRecord->temps : $distanceRecord->metres;
                $results[] = [
                    'spot_id' => $spot->id,
                    'regionid' => $spot->region_id,
                    'name' => $spot->name,
                    'distance' => $distanceRecord->metres,
                    'time' => $distanceRecord->temps,
                    'value' => $value,
                    'first_image' => $firstImageUrl,
                ];
            }
        }

        // Trier les résultats par distance ou temps en fonction du mode
        usort($results, function ($a, $b) use ($mode) {
            // Trier par la clé 'value' qui contient la distance ou le temps
            return $a['value'] <=> $b['value'];
        });

        // Limiter à 10 résultats maximum (modifiable)
        $results = array_slice($results, 0, $limit);

        return response()->json($results);
    }
    public function panoShow($id)
    {
        // Recherchez le spot correspondant dans la base de données
        $spot = Spots::find($id);

        if (!$spot || !$spot->img360) {
            // Retournez une erreur 404 si le spot ou l'URL 360° est introuvable
            abort(404, 'Spot or panorama URL not found.');
        }

        // Préparez les données pour la vue
        $panoramaData = [
            'spotId' => $id,
            'image' => $spot->img360, // Utilisez directement l'URL

        ];

        return view('frontend.panorama', compact('panoramaData'));
    }
}
