<?php

namespace App\Http\Livewire;

use App\Models\Pictures;
use Livewire\Component;
use Livewire\WithPagination;

class SliderPictures extends Component
{
    use WithPagination;


    public  $idspot;

    protected $listeners = ['PictureDestination'];

    public function PictureDestination($idspot)
    {
        if (!is_null($idspot)) {
            $this->idspot = $idspot;
        }
    }

    public function render()
    {
        $pictures = Pictures::where('spot_id', '=', $this->idspot)
                            ->where('actif', '=', 1)
                            ->paginate(10);

        return view('livewire.slider-pictures', ['pictures' => $pictures]); 
    }
}