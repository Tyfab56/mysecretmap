<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\pictures;
class SliderPictures extends Component
{
    public  $idspot,$pictures; 

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
        if ($this->idspot) {
            $this->pictures = Pictures::select()->where('id', '=', $this->idspot)->paginate(5);
            return view('livewire.slider-pictures');
        }
        else
        {
            return view('livewire.no-slider-pictures');
        }

       
    }
}
