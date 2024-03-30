<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use App\Models\Pays;

class FolderController extends Controller
{
    // Affiche la liste des dossiers
    public function index()
    {
        $folders = Folder::all();
        // Notez le changement de chemin ici pour refléter le nouveau dossier de vues
        return view('admin.folders.index', compact('folders'));
    }

    // Montre le formulaire de création d'un nouveau dossier
    public function create()
    {
         // Récupérer uniquement les pays actifs
         $activeCountries = Pays::where('actif', 1)->get();
    
    return view('admin.folders.create', compact('activeCountries'));
       
    }

    // Stocke un nouveau dossier dans la base de données
    public function store(Request $request)
    {
        // Étendre la validation pour inclure country_id et status
        $request->validate([
            'name' => 'required|string|max:255',
            'country_id' => 'required|exists:pays,pays_id', // Assurez-vous que le pays_id existe dans la table des pays
            'status' => 'required|in:public,private', // Le statut doit être 'public' ou 'private'
        ]);
    
        // Créer le dossier avec les données validées
        Folder::create([
            'name' => $request->name,
            'country_id' => $request->country_id,
            'status' => $request->status, // Assurez-vous que ces clés correspondent aux noms de vos colonnes dans la base de données
        ]);
    
        // Rediriger vers l'index avec un message de succès
        return redirect()->route('admin.folders.index')
                         ->with('success', 'Dossier créé avec succès.');
    }
    

    // Montre le formulaire d'édition pour un dossier existant
    public function edit($id)
    {
        $folder = Folder::findOrFail($id);
        $activeCountries = Pays::where('actif', 1)->get();
    
        return view('admin.folders.edit', compact('folder', 'activeCountries'));
    }

    // Met à jour le dossier dans la base de données
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country_id' => 'required|exists:pays,pays_id',
            'status' => 'required|in:public,private',
        ]);
    
        $folder = Folder::findOrFail($id);
        $folder->update([
            'name' => $request->name,
            'country_id' => $request->country_id,
            'status' => $request->status,
        ]);
    
        return redirect()->route('admin.folders.index')
                         ->with('success', 'Dossier mis à jour avec succès.');
    }

    // Supprime un dossier de la base de données
    public function destroy($id)
    {
        $folder = Folder::findOrFail($id);
        $folder->delete();

        return redirect()->route('admin.folders.index')
                         ->with('success', 'Dossier supprimé avec succès.');
    }
}
