<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimelinesCat;
use App\Models\Timelines;
use App\Models\TimelinesTranslation;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Validator;

class TimelineController extends Controller
{
    public function index()
    {
        $icons = TimelinesCat::get();  
        return view('admin.timeline',compact('icons'));
    } 

    public function store(Request $request)
  
    {
        // Valider les données soumises par l'utilisateur
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:140',
            'description' => 'required|max:255',
            'date' => 'required|date',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Rediriger l'utilisateur avec un message d'erreur si la validation échoue
        if ($validator->fails()) {
            return redirect('timelines/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $filetimeline = $request->file('imagetimeline');

        // traitement image carré
        if ($filetimeline == null) {
            // pas de nouvelle image
            $imagetimelinestatus = 0;
        } else {
            // Recherche si ancienne image et suppression des images coorespondantes

            
            // nouvelle image
            $imagetimelinestatus = 1;
            $extension = $filetimeline->getClientOriginalExtension();
            $imgtimelinename =  $request->file('imagetimeline')->getClientOriginalName();;
            $imgtimelinename = str_replace(' ', '-', $imgtimelinename);
            $imgtimelinename = uniqid() . "_" . $imgtimelinename;


            $disk = Storage::disk('wasabi');
            $bucket = 'mysecretmap';

            // LARGE
       
            $width = 500;
            $height = 375   ;
            $canvas = Image::canvas($width, $height);

            $imagefinale  = Image::make($filesquare)->resize(
                $width,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                }
            );

            $canvas->insert(
                $imagefinale,
                'center'
            );
            $canvas->encode($extension);

            $disk->put('/large/large-' . $imgtimelinename, (string) $canvas, 'public');
            $largetimelinename = $disk->url('large/large-' . $imgtimelinename);

        }
            
            
        // Enregistrer la timeline en base de données
        $timeline = new Timelines;
        $timeline->date = $request->input('date');
        $timeline->timelinescat_id = $request->input('timelinescat');
        
        // Enregistrer l'image si elle est fournie
        if ($imagetimelinestatus == 1) {
            $timeline->bucket = $bucket;
            $timeline->fichier = $imgtimelinename;
            $timeline->image = $largetimelinename;
        }

        $timeline->save();
   

        // Enregistrer les traductions pour la timeline
        $title_translations = $request->input('title');
        $description_translations = $request->input('description');

        foreach ($title_translations as $locale => $title) {
            $translation = new TimelinesTranslation;
            $translation->timelines_id = $timeline->id;
            $translation->locale = $locale;
            $translation->texte = $title;
            $translation->description = $description_translations[$locale];
            $translation->save();
        }

        // Rediriger l'utilisateur vers une page de confirmation ou de gestion des timelines
        return back()->with('success', 'Timeline créée avec succès.');
    }
    
}