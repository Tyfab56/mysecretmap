<?php

namespace App\Http\Controllers;

use App\Models\ShareMedia;
use App\Models\Folder;
use Illuminate\Http\Request;
use App\Jobs\GenerateVideoThumbnail;

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
            'media' => 'required|file',
            'media_type' => 'required|in:photo,video,film',
        ]);
    
        // Stockage temporaire du fichier média localement
        $mediaFile = $request->file('media');
        $temporaryPath = $mediaFile->store('temp', 'local');
        $mediaType = $request->input('media_type');
    
        // Préparation des données communes à passer aux jobs
        $commonData = [
            'folder_id' => $request->input('folder_id'),
            'title' => $request->input('title'),
            'media_type' => $mediaType,
        ];
    
        if ($mediaType === 'photo') {
            // Pour les photos, on peut vouloir un traitement spécifique
            // Comme redimensionner ou appliquer des filtres avant de sauvegarder sur S3
            ProcessPhoto::dispatch($temporaryPath, $commonData);
        } elseif ($mediaType === 'video' || $mediaType === 'film') {
            // Pour les vidéos et les films, on lance un job pour générer une vignette et une version de prévisualisation
            ProcessVideoForPreview::dispatch($temporaryPath, $commonData);
        }
    
        return redirect()->route('admin.sharemedias.index')->with('success', 'Média en cours de traitement.');
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
            'media_link' => 'required',
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

