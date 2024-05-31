<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SpotBannerUser;
use App\Models\Banner;

class SpotBanner extends Component
{
    public $spotId;
    public $banner;

    protected $listeners = ['updateBanner' => 'loadBanner'];

    public function mount($spotId)
    {
        $this->spotId = $spotId;
        $this->loadBanner();
    }

    public function loadBanner($spotId = null)
    {
        if ($spotId) {
            $this->spotId = $spotId;
        }

        // Recherchez une bannière active pour le spot spécifié
        $spotBanner = SpotBannerUser::where('spot_id', $this->spotId)->first();

        // Vérifiez si la bannière associée est active
        $banner = null;
        if ($spotBanner) {
            $banner = Banner::where('banner_id', $spotBanner->banner_id)->where('active', 1)->first();
        }
        dd($banner);
        // Si aucune bannière active n'est trouvée pour ce spot, utilisez la bannière n°1 par défaut
        if (!$banner) {
            $banner = Banner::where('id', 1)->where('active', 1)->first();
        }

        $this->banner = $banner;
    }

    public function render()
    {
        return view('livewire.spot-banner', ['banner' => $this->banner]);
    }
}
