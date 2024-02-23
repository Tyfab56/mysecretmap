<?php

namespace App\Http\Controllers;

use App\Models\RandoSpot;
use Illuminate\Http\Request;

class RandoController extends Controller
{
    public function listRandos(Request $request)
{
    $query = RandoSpot::query();

    if ($request->input('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $randos = $query->paginate(10); // Modifiez le nombre selon le nombre d'items que vous souhaitez par page

    return view('admin.randos.listrandos', compact('randos'));
}

    public function create()
    {
        return view('admin.randos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'spot_id' => 'required|integer|exists:spots,id', // Assurez-vous que le spot existe
            'video_link' => 'required', // Valide si fourni
        ]);
    
        $rando = new RandoSpot([
            'spot_id' => $request->spot_id,
            'video_link' => $request->video_link,
            // Ajoutez ici d'autres champs selon votre modèle
        ]);
    
        $rando->save();
    
        return redirect()->route('admin.randos.listrandos')->with('success', 'Nouvelle randonnée ajoutée avec succès.');
    }

    public function storeTranslations(Request $request)
{
    // Valider la requête
    $request->validate([
        'language' => 'required|string',
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        // Ajouter d'autres champs de validation si nécessaire
    ]);

    // Trouver la randonnée créée précédemment ou utiliser une autre logique selon votre application
    $rando = RandoSpot::latest()->first();

    // Assumer que vous utilisez un package ou une logique pour gérer les traductions
    // Exemple d'ajout de traductions
    $rando->translateOrNew($request->language)->nom = $request->titre;
    $rando->translateOrNew($request->language)->description = $request->description;
    $rando->save();

    // Rediriger vers une page appropriée avec un message de succès
    return redirect()->route('admin.randos.create')
    ->with('success', 'Traduction ajoutée avec succès. Vous pouvez maintenant ajouter une traduction dans une autre langue.')
    ->with('previous_language', $request->language);
}

    public function edit($id)
    {
        
    $rando = RandoSpot::with('translations')->findOrFail($id);
    $langs = ['en', 'fr'];

    return view('admin.randos.edit', compact('rando', 'langs'));
    }

    public function update(Request $request, $id)
    {
        $selectedLang = $request->input('selected_lang'); // Récupère la langue sélectionnée
    
        $rando = RandoSpot::findOrFail($id);
    
        // Validation des données reçues du formulaire
        // Assurez-vous d'ajuster les règles de validation selon vos besoins
        $validated = $request->validate([
            'video_link' => 'required|url',
            "translations.{$selectedLang}.title" => 'required|string|max:255',
            "translations.{$selectedLang}.description" => 'required|string',
        ]);
    
        // Mise à jour des informations générales
        $rando->video_link = $validated['video_link'];
    
        // Mise à jour de la traduction pour la langue sélectionnée
        $rando->translateOrNew($selectedLang)->title = $request->input("translations.{$selectedLang}.title");
        $rando->translateOrNew($selectedLang)->description = $request->input("translations.{$selectedLang}.description");
    
        $rando->save();
    
        return redirect()->route('admin.randos.index')->with('success', 'Randonnée mise à jour avec succès.');
    }
    

    public function destroy($id)
    {
        $rando = RandoSpot::findOrFail($id);
        $rando->delete();

        return redirect()->route('admin.randos.listrandos')->with('success', 'Randonnée supprimée avec succès.');
    }


    public function storeBaseInfo(Request $request)
{
    // Validation des données du formulaire
    $validated = $request->validate([
        'spot_id' => 'required|integer|exists:spots,id', 
        'video_link' => 'required' 
    ]);

    // Création de la nouvelle randonnée avec les données validées
    $rando = new RandoSpot();
    $rando->spot_id = $validated['spot_id'];
    $rando->video_link = $validated['video_link'] ?? null; // Utilisez null si vide
    // Vous pouvez ajouter ici d'autres champs selon votre modèle RandoSpot

    $rando->save(); // Sauvegarde de la randonnée dans la base de données

    // Retour d'une réponse JSON en cas de succès
    return response()->json([
        'success' => 'Informations de base enregistrées avec succès.',
        'randoId' => $rando->id, // Retourne l'ID de la randonnée pour utilisation ultérieure si nécessaire
    ]);
}

    
}
