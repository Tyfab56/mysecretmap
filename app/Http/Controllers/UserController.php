<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\UserTranslation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Update the user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'name' => 'required|string|max:191',
            'prenom' => 'nullable|string|max:191', 
            'pseudo' => 'nullable|string|max:191', 
        ]);

        // Update the user's profile
        $user->update($data);

        // Redirect back with a success message
        return redirect()->back()->with('successUser', 'Profile updated successfully!');
    }

    public function updateSocial(Request $request, User $user)
{
    
    // Validate the incoming request data
    $validationRules = [
        'internet' => 'nullable|url',
        'facebook' => 'nullable|url',
        'instagram' => 'nullable|url',
        'twitter' => 'nullable|url',
        'five_hundred_px' => 'nullable|url',
        'tiktok' => 'nullable|url',
        'mastodon' => 'nullable|url',
    ];

    $validator = Validator::make($request->all(), $validationRules);

    // Vérifiez si la validation a échoué
    if ($validator->fails()) {
        // Vous pouvez personnaliser le message d'erreur ici
        $url = url()->previous() . '#collapseTwo';
        return redirect($url)->withErrors($validator)->withInput();
    }

    // Si la validation réussit, mettez à jour les profils sociaux
    $data = $validator->validated();

    // Update the user's social profiles
    $user->update($data);

    // Redirect back with a success message
    $url = url()->previous() . '#collapseTwo';
    return redirect($url)->with('successSocial', 'Social profiles updated successfully!');
    
}


public function updateWhoIAm(Request $request)
{

    $user = Auth::user();

    // Valider la demande
    $request->validate([
        'whoiam_id' => 'required|exists:whoiams,id',
    ]);

    // Mettre à jour le champ "whoiam" de l'utilisateur
    $user->whoiam_id = $request->input('whoiam_id');
    $user->save();

    return redirect()->route('myaccount')->with('success', 'Votre profil a été mis à jour avec succès.');
}


    public function show($id)
    {
        // Récupération de l'utilisateur à partir de son ID
        $user = User::findOrFail($id);

        // Retour de la vue avec l'utilisateur comme donnée
        return view('frontend.userprofil', compact('user'));
    }




public function updatePhotographerInfo(Request $request)
{
   // Valdation de la banniere


   $this->validate($request, [
    'photographer_banner' => 'image|mimes:jpeg,jpg|max:2048',
    ]);

  if ($request->hasFile('photographer_banner')) {
    $file = $request->file('photographer_banner');
    $extension = $file->getClientOriginalExtension();
    $imgname =  $user->id . "_profil.jpg; 

    $disk = Storage::disk('wasabi');
    $bucket = 'mysecretmap';  

    // Process the image
   
    $canvas = Image::canvas(1920,640);
    $imagefinale = Image::make($file);
    $canvas->insert($imagefinale, 'center');
    $canvas->encode($extension);

    // Save the image to Wasabi
    $disk->put('/large/' . $imgname, (string) $canvas, 'public');
    $user->photographer_banner = $disk->url('large/' . $imgname);

    $user->save();

    $validatedData = $request->validate([
        'language' => 'required|in:en,fr', 
        'photographer_title' => 'required|string|max:255',
        'photographer_description' => 'required|string',
    ]);

    $user = auth()->user();

 
    $userTranslation = UserTranslation::firstOrNew([
        'user_id' => $user->id,
        'locale' => $validatedData['language'],
    ]);

    $userTranslation->user_id = $user->id;
    $userTranslation->locale = $validatedData['language'];
    $userTranslation->titre = $validatedData['photographer_title'];
    $userTranslation->description = $validatedData['photographer_description'];


    $userTranslation->save();

    if ($request->ajax()) {
        return response()->json(['message' => 'Mise à jour réussie']);
    }
  
    return back()->with('success', 'Vos informations de photographe ont été mises à jour avec succès.');
}

public function getPhotographerInfo(Request $request)
    {
        // Récupérez la langue sélectionnée depuis la requête
        $selectedLanguage = $request->input('language');

        // Récupérez les informations du photographe en fonction de la langue
        $user = Auth::user();
        $photographerInfo = $user->translations()->where('locale', $selectedLanguage)->first();

        // Retournez les informations au format JSON
        return response()->json([
            'photographer_title' => $photographerInfo->titre,
            'photographer_description' => $photographerInfo->description,
        ]);
    }







}
