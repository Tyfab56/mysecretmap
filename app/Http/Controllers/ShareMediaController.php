<?php

namespace App\Http\Controllers;

use App\Models\ShareMedia;
use App\Models\Folder;
use Illuminate\Http\Request;

class ShareMediaController extends Controller
{
    // Liste tous les médias
    public function index()
    {
        $shareMedias = ShareMedia::all();
        return view('admin.sharemedias.index', compact('shareMedias'));
    }

    // Affiche le formulaire de création d'un nouveau média
    public function create()
    {
        $folders = Folder::all(); // Récupère tous les dossiers pour les sélectionner dans le formulaire
        return view('admin.sharemedias.create', compact('folders'));
    }

    // Enregistre un nouveau média dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'folder_id' => 'required|exists:folders,id',
            'title' => 'required|string|max:255',
            'media_link' => 'required|url',
            'media_type' => 'required|in:photo,video,film',
            'credits' => 'required|integer|min:1'
        ]);

        ShareMedia::create($request->all());

        return redirect()->route('admin.sharemedias.index')
                         ->with('success', 'Média ajouté avec succès.');
    }

    // Affiche le formulaire d'édition pour un média existant
    public function edit($id)
    {
        $shareMedia = ShareMedia::findOrFail($id);
        $folders = Folder::all();
        return view('admin.sharemedias.edit', compact('shareMedia', 'folders'));
    }

    // Met à jour le média dans la base de données
    public function update(Request $request, $id)
    {
        $request->validate([
            'folder_id' => 'required|exists:folders,id',
            'title' => 'required|string|max:255',
            'media_link' => 'required|url',
            'media_type' => 'required|in:photo,video,film',
            'credits' => 'integer|min:1'
        ]);

        $shareMedia = ShareMedia::findOrFail($id);
        $shareMedia->update($request->all());

        return redirect()->route('admin.sharemedias.index')
                         ->with('success', 'Média mis à jour avec succès.');
    }

    // Supprime un média de la base de données
    public function destroy($id)
    {
        $shareMedia = ShareMedia::findOrFail($id);
        $shareMedia->delete();

        return redirect()->route('admin.sharemedias.index')
                         ->with('success', 'Média supprimé avec succès.');
    }
}

