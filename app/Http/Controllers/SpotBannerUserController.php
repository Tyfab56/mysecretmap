<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SpotBannerUser;
use App\Models\Spot;
use App\Models\Banner;
use Illuminate\Http\Request;

class SpotBannerUserController extends Controller
{
    public function attachBanner(Request $request, $spotId, $bannerId)
    {
        $spotBannerUser = SpotBannerUser::create([
            'spot_id' => $spotId,
            'banner_id' => $bannerId,
            'user_id' => $request->user()->id
        ]);

        return back()->with('success', 'Banner attaché au spot avec succès.');
    }

    public function detachBanner($spotId, $bannerId)
    {
        $spotBannerUser = SpotBannerUser::where('spot_id', $spotId)
                                        ->where('banner_id', $bannerId)
                                        ->first();
        if ($spotBannerUser) {
            $spotBannerUser->delete();
            return back()->with('success', 'Banner détaché du spot avec succès.');
        }
        return back()->with('error', 'Association non trouvée.');
    }

    public function getBanners()
    {
       
        return view('admin.banners.associer');
    }

    public function search(Request $request)
    {
        // Vérifiez si l'ID de l'utilisateur est présent dans la requête
        if ($request->has('user_id')) {
            $userId = $request->input('user_id');

            // Recherchez les spots associés à l'utilisateur spécifié
            $associatedSpots = SpotBannerUser::where('user_id', $userId)
                ->join('spots', 'spots.id', '=', 'spot_banner_users.spot_id')
                ->join('banners', 'banners.id', '=', 'spot_banner_users.banner_id')
                ->select('spot_banner_users.id', 'spots.name as spot_name', 'banners.name as banner_name')
                ->get();

            return response()->json($associatedSpots);
        }

        // Retournez une réponse vide si l'ID de l'utilisateur n'est pas fourni
        return response()->json([]);
    }
}