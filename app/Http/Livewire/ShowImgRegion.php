<?php

namespace App\Http\Livewire;

use App\Models\Spots;
use Livewire\Component;

class ShowImgRegion extends Component
{
    public  $idspot;

    protected $listeners = [
        'ImgRegion'
    ];

    public function ImgRegion($idspot)
    {
        if (!is_null($idspot)) {
            $this->idspot = $idspot;
        }
    }

    public function render()
    {
        $this->spot = spots::select('id', 'imgvueregionmedium', 'imgvueregionlarge')->where('id', '=', $this->idspot)->first();


        return view('livewire.show-img-region');
    }
}
