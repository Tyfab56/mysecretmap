<?php

namespace App\Http\Livewire;

use App\Models\Pictures;
use Livewire\Component;
use Livewire\WithPagination;

class SliderPictures extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

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
        $spot = Spots:where('id','=',$this->idspot)->get();                    

        return view('livewire.slider-pictures', ['pictures' => $pictures,'$spot' => $spot]); 
    }
}