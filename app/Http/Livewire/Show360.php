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
            $this->loadSpot();
        }
    }

    public function loadSpot()
        {
            $this->spot = Spots::select('id', 'img360')->where('id', $this->idspot)->first();

            if ($this->spot) {
                $this->emit('spotLoaded', $this->spot); // Émettre l'événement avec les données du spot
            } else {
                // Optionnellement, gérer le cas où le spot n'est pas trouvé
                session()->flash('error', 'Spot not found');
            }
        }

    public function render()
        {
            return view('livewire.show360', [
                'spot' => $this->spot
            ]);
        }
}
