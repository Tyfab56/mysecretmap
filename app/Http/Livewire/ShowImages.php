<?php

namespace App\Http\Livewire;

use App\Models\Pictures;
use Livewire\Component;

class ShowImages extends Component
{
    public  $idspot, $pictures;

    protected $listeners = [
        'Pictures'
    ];

    public function Pictures($idspot)
    {
        if (!is_null($idspot)) {
            $this->idspot = $idspot;
        }
    }

    public function render()
    {

        $this->pictures = pictures::select('id', 'spot_id', 'medium')->where('spot_id', '=', $this->idspot)->where('actif', 1)->first();
        return view('livewire.show-images');
    }
}
