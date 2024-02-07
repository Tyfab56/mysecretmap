<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Hotel;

class HotelsNearby extends Component
{
    public $latitude;
    public $longitude;
    public $hotels = [];

    protected $listeners = ['loadHotels'];

    public function loadHotels($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->hotels = Hotel::getHotelsNearby($this->latitude, $this->longitude);
    }

    public function render()
    {
        return view('livewire.hotels-nearby');
    }
}
