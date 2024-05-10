<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Show360 extends Component
{

    public  $idspot;

    protected $listeners = [
        'Img360'
    ];

    public function Img360($idspot)
    {
        if (!is_null($idspot)) {
            $this->idspot = $idspot;
        }
    }

    public function render()
    {
        $this->spot = spots::select('id', 'img360')->where('id', '=', $this->idspot)->first();
        return view('livewire.show360');
    }
}
