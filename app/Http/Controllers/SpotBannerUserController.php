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
        $user = User::find($request->user_id); // Assurez-vous que la valeur de user_id est disponible dans la requête

        // Vérifier si le spot et la bannière existent
        $spot = Spot::find($spotId);
        $banner = Banner::find($bannerId);
    
        // Vérifier si l'utilisateur, le spot et la bannière existent
        if ($user && $spot && $banner) {
            // Créer une nouvelle entrée dans la table spot_banner_user
            $spotBannerUser = new SpotBannerUser();
            $spotBannerUser->spot_id = $spotId;
            $spotBannerUser->banner_id = $bannerId;
            $spotBannerUser->user_id = $user->id;
            $spotBannerUser->save();
    
            return response()->json(['success' => true, 'message' => 'Bannière associée avec succès.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Impossible d\'associer la bannière avec le spot pour cet utilisateur. Veuillez vérifier les informations fournies.']);
        }
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