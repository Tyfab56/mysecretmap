<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WindyWidget extends Component
{
    public $windylat = 0;
    public $windylng = 0;

    protected $listeners = ['initWindy' => 'initializeWidget'];

    public function initializeWidget($lat,$lng)
    {
        $this->windylat = $lat;
        $this->windylng = $lng;
    }

    public function render()
    {
        return view('livewire.windy-widget');
    }
}


