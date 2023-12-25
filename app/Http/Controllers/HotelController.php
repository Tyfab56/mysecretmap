<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    public function partnership() {
        return view('frontend.hotelspartnership');
    }

    public function index()
{
    $hotels = Hotel::all(); // Récupère tous les hôtels
    return view('admin.hotels', compact('hotels'));
}

public function edit(Hotel $hotel)
{
    return view('admin.createhotel', compact('hotel'));
}

public function update(Request $request, Hotel $hotel)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'address' => 'nullable|max:255',
        'city' => 'nullable|max:255',
        'postal_code' => 'nullable|max:20',
        'country_code' => 'nullable|max:2',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'description' => 'nullable',
        'image_url' => 'nullable|url',
        'website_url' => 'nullable|url'
    ]);

    // Mettre à jour l'hôtel avec les données validées
    $hotel->update($validatedData);

    // Redirection vers la liste des hôtels avec un message de succès
    return redirect()->route('admin.hotels')->with('success', 'Hôtel mis à jour avec succès.');
}



    public function create()
    {

        return view('admin.createhotel');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'address' => 'nullable|max:255',
        'city' => 'nullable|max:255',
        'postal_code' => 'nullable|max:20',
        'country_code' => 'nullable|max:2',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'description' => 'nullable',
        'image_url' => 'nullable|url',
        'website_url' => 'nullable|url'
    ]);

    $hotel = new Hotel();
    $hotel->name = $validatedData['name'];
    $hotel->address = $validatedData['address'] ?? null;
    $hotel->city = $validatedData['city'] ?? null;
    $hotel->postal_code = $validatedData['postal_code'] ?? null;
    $hotel->country_code = $validatedData['country_code'] ?? null;
    $hotel->latitude = $validatedData['latitude'] ?? null;
    $hotel->longitude = $validatedData['longitude'] ?? null;
    $hotel->description = $validatedData['description'] ?? null;
    $hotel->image_url = $validatedData['image_url'] ?? null;
    $hotel->website_url = $validatedData['website_url'] ?? null;

    $hotel->save();
    dd('alors');
    return redirect()->route('admin.hotels')->with('success', 'Hôtel ajouté avec succès.');
}

public function destroy(Hotel $hotel)
{
    $hotel->delete();
    return redirect()->route('admin.hotels')->with('success', 'Hôtel supprimé avec succès.');
}

}


