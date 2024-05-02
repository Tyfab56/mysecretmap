<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
       
       

         $validatedData = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Taille maximale de 2 Mo pour l'image
            'redirect_url' => 'required',
            'active' => 'nullable|boolean',
        ]);
        

        $imagePath = $request->file('image_url')->store('temp');
        
        $localImagePath = storage_path('app/' . $imagePath);
    
        // Connexion au disque Wasabi S3
        $diskS3 = Storage::disk('wasabi');
        $originalImagePathOnS3 = 'images/original/' . $request->file('image_url')->getClientOriginalName();
        $diskS3->put($originalImagePathOnS3, fopen($localImagePath, 'r+'), 'public');
    
        // Supprimer l'image temporaire stockée localement
        Storage::delete($imagePath);
  
        // Créer le nouvel objet Banner avec les données validées
        $banner = new Banner();
        $banner->user_id = $validatedData['user_id'];
        $banner->title = $validatedData['title'];
        $banner->image_url = $imagePath; // Stocker le chemin de l'image
        $banner->redirect_url = $validatedData['redirect_url'];
        $banner->active = isset($validatedData['active']) ? $validatedData['active'] : false; 
        $banner->save();


        
        return redirect()->route('admin.banners.index')->with('success', 'Banner ajouté avec succès.');
    }

    public function show(Banner $banner)
    {
        return view('admin.banners.show', compact('banner'));
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image_url' => 'required|url',
            'redirect_url' => 'required|url',
            'active' => 'sometimes|boolean'
        ]);

        $banner->update($request->all());
        return redirect()->route('admin.banners.index')->with('success', 'Banner mis à jour avec succès.');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('admin.banners.index')->with('success', 'Banner supprimé avec succès.');
    }
}

