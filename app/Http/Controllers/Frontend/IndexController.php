<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Pays;
use App\Models\User;
use App\Models\Spots;
use App\Models\Pictures;
use App\Models\Circuits;
use App\Models\Circuits_details;
use App\Models\Default_spots;
use App\Models\Noscircuits;
use App\Models\TimelineCat;
use App\Models\Timelines;
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
        //$markers = Spots::select('id', 'name', 'lng', 'lat', 'imgpanosmall', 'imgsquaresmall', 'typepoint_id')
        //    ->where('pays_id', $idpays)->where('actif', 1)->get();

        $markerspays = Pays::where('actif', 1)->get();

        // récupération des circuits pour ce pays par defaut
        $noscircuits = NosCircuits::where('pays_id', $idpays)->orderBy('rang')->get();
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

        return view('frontend/index', compact('lastPays', 'idpays', 'pays', 'payslist', 'payslng', 'payslat', 'payszoom', 'paysoffset', 'spot', 'lastspots', 'noscircuits','markerspays'));
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
                 // Recuperation du circuit geometrique
              // Sous forme de plusieurs segments
              $allgeometry = Circuits_details::where('circuit_id','=',$circuitactif)->where('geometry','<>',null)->get();
              $geometry = array();
              foreach ($allgeometry as $geo)
              {
               array_push($geometry, $geo->geometry);
              }
            
    

             }   

        } else {
            $circuits = null;
            $circuitactif = 0;
            $geometry ='';
        }
        // Si un cictuit est actif, on verifie que c'est dans le bon pays qui est egalement actif
       // Test du circuit en cours
       

        return view('frontend/destination', compact('lastPays', 'idpays', 'markers', 'payslist', 'pays', 'payslng', 'payslat', 'payszoom', 'paysoffset', 'spot','lastspots','circuits','circuitactif','geometry'));
    }

    public function nextdestinations()
    {
        return view('frontend/nextdestinations');
    }

    public function myaccount()
    {
        // Information sur cet user
        $user = Auth::user();
        // chargement des pays actifs
        $payslist = Pays::where('actif', '=', 1)->orderBy('pays', 'asc')->get();
        return view('frontend/myaccount',compact('user','payslist'));
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


    public function addimagespotstoredz(Request $request)
    {


        $file = $request->file('file');
        $validatedData = $request->validate(
            [
                'file' => 'image|mimes:jpeg,jpg|max:20048',
            ]
        );

        $iduser = Auth::id();
        $spotid = $request->spotid;
        $spot = Spots::where('id', '=', $spotid)->first();
        $paysid = $spot->pays_id;
       




        if ($file == null) {
            // pas de nouvelle image
            $imagestatus = 0;
        } else {
            $extension = $file->getClientOriginalExtension();
            $imgname =  $request->file('file')->getClientOriginalName();;
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
    public function timeline(Request $request)
    {
            $perPage = 5; // Nombre d'éléments à récupérer par page
            $page = $request->input('page', 1); // Page actuelle
            $skip = ($page - 1) * $perPage; // Nombre d'éléments à sauter
           
            // Récupérer les éléments de la timeline
            $items = Timelines::orderBy('id', 'desc')
                             ->skip($skip)
                             ->take($perPage)
                             ->get();
        
            // Calculer le nombre total de pages
            $totalitems = Timelines::count();
            $totalpages = ceil($totalitems / $perPage);
        
            // Retourner les éléments de la page actuelle et les informations de pagination
            

            if ($request->ajax()) {
                $output = '';
                foreach($items as $spot)
                {
                    $output .= '<div class="cd-timeline__block">
                        <div class="cd-timeline__img cd-timeline__img--picture">
                            <img src="' . asset('frontend/assets/images/icon-image/' . $spot->timelinescat->icon) . '" alt="Picture">
                        </div> <!-- cd-timeline__img -->
                        <div class="cd-timeline__content text-component">
                            <h2>' . $spot->texte . '</h2>
                            <p class="color-contrast-medium">' . $spot->description . '</p>
                            <div class="flex justify-between items-center">
                                <span class="cd-timeline__date">' . $spot->date . '</span>
                            </div>
                        </div> <!-- cd-timeline__content -->
                    </div> <!-- cd-timeline__block -->';
                }
                return Response($output);
            }
        
            return view('frontend.timeline', compact('items','totalpages'));
    }

    public function instruction()
    {
        return view('frontend.instructions');
    }
    
    public function avatarstore(Request $request)
    {
 
        $avatar = $request->file('file');

        // traitement image carré
        if ($avatar == null) {
            // pas de nouvelle image
            $imageavatarstatus = 0;
        } else {
            // Recherche si ancienne image et suppression des images coorespondantes

            
            // nouvelle image
            $imageavatarstatus = 1;
            $extension = $avatar->getClientOriginalExtension();
            $imgavatarname =  $request->file('file')->getClientOriginalName();;
            $imgavatarname = str_replace(' ', '-', $imgavatarname);
            $imgavatarname = uniqid() . "_" . $imgavatarname;


            $disk = Storage::disk('wasabi');
            $bucket = 'mysecretmap';

            // LARGE
       
            $width = 400;
            $height = 400   ;
            $canvas = Image::canvas($width, $height);

            $imagefinale  = Image::make($avatar)->fit(400, 400, null, 'center', false);

            $canvas->insert(
                $imagefinale,
                'center'
            );
            $canvas->encode($extension);

            $disk->put('/large/large-' . $imgavatarname, (string) $canvas, 'public');
            $largeavatarname = $disk->url('large/large-' . $imgavatarname);

        }
            
            
        // Retrouver le user en cours
        $iduser = Auth::user()->id;
        $user = User::find($iduser);    

       // Supprimer l'ancien avatar
        $filelarge = parse_url($user->profile_photo_path);
        if ($filelarge)
        {
            $disk->delete($filelarge);
        }
      
        
        // Enregistrer l'image si elle est fournie
        if ($imageavatarstatus == 1) {
            $user->profile_photo_path = $largeavatarname;
        }

        $user->save();
   
        return response()->json([
            'message' => 'OK'
        ]);
    }
}
