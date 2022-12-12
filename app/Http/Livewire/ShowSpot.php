<?php

namespace App\Http\Livewire;

use App\Models\Spots;
use App\Models\SpotsTranslation;
use Livewire\Component;

class ShowSpot extends Component
{





    public $idspot, $spot, $traduction, $randotime, $timeonsite;
    protected $listeners = [
        'SpotSelected', 'SunsetMaj', 'SunriseMaj'
    ];

    public function SpotSelected($value)
    {
        if (!is_null($value)) {
            $this->idspot = $value;
        }
    }


    public function render()
    {

        if ($this->idspot) {
            $this->spot = spots::select()->where('id', '=', $this->idspot)->first();
            $this->timeonsite = gmdate("H:i", $this->spot->timeonsite);
            $this->randotime = gmdate("H:i", $this->spot->randotime);

            // Recherche d ela description dans la table

            $this->traduction = SpotsTranslation::where('spots_id', '=', $this->idspot)
                ->where('locale', '=', app()->getlocale())
                ->first();
        }
        return view('livewire.show-spot');
    }
}
