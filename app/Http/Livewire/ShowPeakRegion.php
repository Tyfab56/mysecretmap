<?php

namespace App\Http\Livewire;

use App\Models\Spots;
use Livewire\Component;

class ShowPeakRegion extends Component
{
    public  $idspot;

    protected $listeners = [
        'ImgPeak'
    ];

    public function ImgPeak($idspot)
    {
        if (!is_null($idspot)) {
            
            $this->idspot = $idspot;
            
        }
    }

    public function render()
    {
        
        $this->spot = spots::select('id', 'imgpeakmedium', 'imgpeaklarge')->where('id', '=', $this->idspot)->first();


        return view('livewire.show-peak-region');
    }
}
