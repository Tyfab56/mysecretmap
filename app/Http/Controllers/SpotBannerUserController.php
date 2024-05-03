<?php

namespace App\Http\Controllers\Admin;

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

    public function getBanners($spotId)
    {
       
        return view('admin.banners.associer');
    }
}