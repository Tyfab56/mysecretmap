<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Circuits;
use App\Models\Circuits_details;

class ShowCircuit extends Component
{
    public  $idcircuit,$circuit;
    
    protected $listeners = [
        'RefreshCircuit'
    ];

    public function RefreshCircuit($idcircuit)
    {
        if (!is_null($idcircuit)) {
            $this->idcircuit = $idcircuit;
        }
    }

    public function render()
    {
        
        if ($this->idcircuit) {
            $this->circuit = Circuits_details::where('circuit_id', '=', $this->idcircuit)->orderby('rang')->get();
          
        }   
       
        return view('livewire.show-circuit');
        
    }
}
