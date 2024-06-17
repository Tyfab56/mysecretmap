<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Spot;
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
}
