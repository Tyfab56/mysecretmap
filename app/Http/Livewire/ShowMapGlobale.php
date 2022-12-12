<?php

namespace App\Http\Livewire;

use App\Models\Spots;
use Livewire\Component;

class ShowMapGlobale extends Component
{
    public  $idspot;

    protected $listeners = [
        'ImgMap'
    ];

    public function ImgMap($idspot)
    {
        if (!is_null($idspot)) {
            $this->idspot = $idspot;
        }
    }

    public function render()
    {
        $this->spot = spots::select('id', 'imgmapmedium')->where('id', '=', $this->idspot)->first();
        return view('livewire.show-map-globale');
    }
}
