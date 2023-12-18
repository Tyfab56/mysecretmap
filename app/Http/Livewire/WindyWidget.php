<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WindyWidget extends Component
{
    public $lat = 0;
    public $lng = 0;

    protected $listeners = ['initWindy' => 'initializeWidget'];

    public function initializeWidget($lat,$lng)
    {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    public function render()
    {
        return view('livewire.windy-widget');
    }
}


