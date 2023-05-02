<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Timelines;
use App\Models\TimelinesTranslation;
use Illuminate\Support\Facades\Storage;
use Validator;

class TimelineController extends Controller
{
    public function index()
    {
        $timeline = Timelines::orderBy('id', 'desc')->get();
        return view('frontend.timeline',compact('timeline'));
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

        // Enregistrer la timeline en base de données
        $timeline = new Timelines;
        $timeline->date = $request->input('date');

        // Enregistrer l'image si elle est fournie
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/timelines'), $filename);
            $timeline->image = $filename;
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