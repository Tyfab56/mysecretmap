<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SpotBannerUser;
use App\Models\Spots;
use App\Models\User;
use App\Models\Banner;
use Illuminate\Http\Request;

class SpotBannerUserController extends Controller
{
    public function attachBanner(Request $request, User $user, $spotId, $bannerId)
    {
        // Récupération du spot, de la bannière et de l'utilisateur
        $spot = Spots::findOrFail($spotId);
        $banner = Banner::findOrFail($bannerId);
        $userId = $request->user_id;

        // Votre logique pour associer le spot, la bannière et l'utilisateur

        // Création de l'association dans la table pivot spot_banner_user
        $association = new SpotBannerUser();
        $association->spot_id = $spotId;
        $association->banner_id = $bannerId;
        $association->user_id = $userId;
        $association->save();

        return response()->json(['message' => 'Bannière associée au spot avec succès'], 200);
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
            $associatedSpots = SpotBannerUser::where('spot_banner_user.user_id', $userId)
                ->join('spots', 'spots.id', '=', 'spot_banner_user.spot_id')
                ->join('banners', 'banners.id', '=', 'spot_banner_user.banner_id')
                ->select('spot_banner_user.id', 'spots.name as spot_name', 'banners.title as banner_name')
                ->get();


            return response()->json($associatedSpots);
        }

        // Retournez une réponse vide si l'ID de l'utilisateur n'est pas fourni
        return response()->json([]);
    }
}