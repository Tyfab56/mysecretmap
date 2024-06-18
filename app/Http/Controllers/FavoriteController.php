<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
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
    public function index()
    {
        // Récupérer les favoris de l'utilisateur connecté avec les informations des spots et des régions
        $favorites = auth()->user()->favorites()->with(['spot.region'])->get();

        // Retourner la vue avec les favoris
        return view('frontend.favorites.index', compact('favorites'));
    }
}
