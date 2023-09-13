<?php

namespace App\Http\Livewire;

use App\Models\Pictures;
use Livewire\Component;

class SliderPictures extends Component
{
    public  $idspot, $pictures;

    protected $listeners = [
        'PictureDestination'
    ];

    public function PictureDestination($idspot)
    {
        if (!is_null($idspot)) {
            $this->idspot = $idspot;
        }
    }

    public function render()
    {

        $this->pictures = Pictures::where('spot_id', '=', $this->idspot)->where('actif', '=', 1)->paginate(30);

        return view('livewire.slider-pictures'); 
    }
}