<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;

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
        // Chemin mis à jour vers la vue de création
        return view('admin.folders.create');
    }

    // Stocke un nouveau dossier dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Folder::create($request->all());

        return redirect()->route('admin.folders.index')
                         ->with('success', 'Dossier créé avec succès.');
    }

    // Montre le formulaire d'édition pour un dossier existant
    public function edit($id)
    {
        $folder = Folder::findOrFail($id);
        // Chemin mis à jour vers la vue d'édition
        return view('admin.folders.edit', compact('folder'));
    }

    // Met à jour le dossier dans la base de données
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $folder = Folder::findOrFail($id);
        $folder->update($request->all());

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
