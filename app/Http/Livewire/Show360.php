<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Spots;

class Show360 extends Component
{

    public  $idspot,$spot;

    protected $listeners = ['Img360' => 'img360'];

    // Renommage de la méthode pour suivre la convention camelCase
    public function img360($idspot)
    {
       
        if (!is_null($idspot)) {
            $this->idspot = $idspot;
            dd($this->idspot);
        }
    }

    public function render()
    {
        if (!is_null($this->idspot)) {
            $this->spot = Spots::select('id', 'img360')->where('id', $this->idspot)->first();
        } else {
            $this->spot = null;
        }
        
        return view('livewire.show360', [
            'spot' => $this->spot
        ]);
    }
}
