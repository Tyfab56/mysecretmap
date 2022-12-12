<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Spots;
use App\Models\SpotsTranslation;

class ShowHeadSpot extends Component
{
    public  $idspot, $titre, $traduction;

    protected $listeners = [
        'InfoSpot'
    ];

    public function InfoSpot($idspot)
    {
        if (!is_null($idspot)) {
            $this->idspot = $idspot;
        }
    }




    public function render()

    {


        if ($this->idspot) {
            $this->spot = spots::select()->where('id', '=', $this->idspot)->first();
            $this->titre = $this->spot->name;

            // Recherche d ela description dans la table

            $this->traduction = SpotsTranslation::where('spots_id', '=', $this->idspot)
                ->where('locale', '=', app()->getlocale())
                ->first();
            return view('livewire.show-head-spot');
        } else {
            return view('livewire.no-spot');
        }
    }
}
