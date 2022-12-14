<?php

namespace App\Http\Controllers;

use App\Models\Pays;
use App\Models\User;
use App\Models\Langs;
use App\Models\Spots;

use App\Models\Typepoints;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use function GuzzleHttp\Promise\exception_for;

class SpotsController extends Controller
{
    public function index()
    {
        // Liste les spots
        $pays = Pays::where('actif', '=', 1)->orderBy('pays', 'asc')->get();

        $users = User::where('admin', '=', 1)->get();
        $spots = Spots::orderBy('id', 'desc')->paginate(15);

        return view('admin.spots', compact('pays', 'users', 'spots'));
    }

    public function edit($id, $lang = null)
    {
        $spot = Spots::where('id', '=', $id)->first();

        $timeonsite = gmdate("H:i", $spot->timeonsite);
        $randotime = gmdate("H:i", $spot->randotime);
        $pays = Pays::where('actif', '=', 1)->orderBy('pays', 'asc')->get();
        $langs = Langs::where('actif', '=', 1)->orderBy('libelle', 'asc')->get();
        // Spot précedent
        $previousspot = Spots::where('id', '<', $spot->id)->orderBy('id', 'desc')->first();
        // Spot suivant
        $nextspot = Spots::where('id', '>', $spot->id)->orderBy('id')->first();

        $typepoints = Typepoints::all();
        Session::put('typeaction', 'edit');

        if (!empty($lang)) {
            $spotlang = $lang;
        } else {
            $spotlang = app()->getLocale();
        }

        return view('admin.addspot', compact('spot', 'langs', 'pays', 'typepoints', 'timeonsite', 'randotime', 'spotlang', 'previousspot', 'nextspot'));
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
        $langs = Langs::where('actif', '=', 1)->orderBy('libelle', 'asc')->get();

        $timeonsite = "00:00";
        $randotime = "00:00";
        $spot = new Spots();
        $typepoints = Typepoints::all();
        Session::put('typeaction', 'add');

        if (!empty($lang)) {
            $spotlang = $lang;
        } else {
            $spotlang = app()->getLocale();
        }
        // Liste 
        return view('admin.addspot', compact('spot', 'pays', 'typepoints', 'timeonsite', 'randotime', 'langs', 'spotlang'));
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
        $spot->save();
        return back()->with('message', 'Texte modifié');
    }
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
                'imgpano' => 'image|mimes:jpeg,jpg|max:10048',
                'imgsquare' => 'image|mimes:jpeg,jpg|max:10048',
                'imgregion' => 'image|mimes:jpeg,jpg|max:10048',
                'imgmap' => 'image|mimes:jpeg,jpg|max:10048',

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


        // traitement du temps sur site
        list($hours, $mins) = explode(':', $request->timeonsite);
        $timeonsite = mktime($hours, $mins, 0) - mktime(0, 0, 0);

        list($hours, $mins) = explode(':', $request->randotime);
        $randotime = mktime($hours, $mins, 0) - mktime(0, 0, 0);

        $actif = $request->has('actif');
        // traitement de imgpano
        // Test existence d'une nouvelle image

        $file = $request->file('imgpano');
        $filesquare = $request->file('imgsquare');
        $fileregion = $request->file('imgregion');
        $filemap = $request->file('imgmap');
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

        // traitement image carte globale
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
        $spot->pays_id = $request->payslist;
        $spot->typepoint_id = $request->typespotlist;
        $spot->timeonsite = $timeonsite;
        $spot->randotime = $randotime;
        $spot->lng = $request->lng;
        $spot->lat = $request->lat;
        $spot->userid = $id;
        $spot->actif = $actif;


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
}
