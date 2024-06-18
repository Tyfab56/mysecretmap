<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Region;
use App\Models\Spots;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addFavorite(Request $request)
    {
        $userId = Auth::id();
        $spotId = $request->input('spot_id');

        $favorite = Favorite::firstOrCreate([
            'user_id' => $userId,
            'spot_id' => $spotId,
        ]);

        return response()->json(['success' => true, 'message' => 'Spot added to favorites']);
    }

    public function removeFavorite(Request $request)
    {
        $userId = Auth::id();
        $spotId = $request->input('spot_id');

        Favorite::where('user_id', $userId)->where('spot_id', $spotId)->delete();

        return response()->json(['success' => true, 'message' => 'Spot removed from favorites']);
    }
    public function index(Request $request)
    {
        // Récupérer les régions pour le filtre
        $regions = Region::all();

        // Filtrer les favoris de l'utilisateur connecté
        $query = auth()->user()->favorites()->with(['spot.region']);

        // Appliquer le filtre de région si sélectionné
        if ($request->has('region') && $request->input('region') !== '') {
            $query->whereHas('spot', function ($q) use ($request) {
                $q->where('region_id', $request->input('region'));
            });
        }

        $favorites = $query->paginate(10);

        // Retourner la vue avec les favoris et les régions
        return view('frontend.favorites.index', compact('favorites', 'regions'));
    }
}
