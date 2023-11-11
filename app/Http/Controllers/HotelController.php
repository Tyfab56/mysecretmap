<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function create()
    {
        return view('create_hotel');
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

    return redirect()->route('some.route')->with('success', 'Hôtel ajouté avec succès.');
}
{
    $hotel->delete();
    return redirect()->route('hotels.index')->with('success', 'Hôtel supprimé avec succès.');
}

}


