<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Spots;
use App\Models\SpotsTranslation;

class ShowMapSpot extends Component
{
    public  $idspot, $titre, $traduction, $timeonsite, $randotime, $sunrise, $sunset;

    protected $listeners = [
        'InfoDestination'
    ];


    public function InfoDestination($idspot, $sunrise, $sunset)
    {
        if (!is_null($idspot)) {
            $this->idspot = $idspot;
        }
        if (!is_null($sunrise)) {
            $this->sunrise = $sunrise;
        }
        if (!is_null($sunset)) {
            $this->sunset = $sunset;
        }
    }




    public function render()

    {


        if ($this->idspot) {
            $this->spot = spots::select()->where('id', '=', $this->idspot)->first();
            $this->titre = $this->spot->name;
            $this->timeonsite = gmdate("H:i", $this->spot->timeonsite);
            $this->randotime = gmdate("H:i", $this->spot->randotime);

            // Recherche d ela description dans la table

            $this->traduction = SpotsTranslation::where('spots_id', '=', $this->idspot)
                ->where('locale', '=', app()->getlocale())
                ->first();
            return view('livewire.show-map-spot');
        } else {
            return view('livewire.no-spot');
        }
    }
}
