<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Spots;
use App\Models\SpotsTranslation;

class ShowVideo extends Component
{
    public $idspot,$traduction;

    protected $listeners = [
        'SpotVideo'
    ];

    public function SpotVideo($value)
    {
        if (!is_null($value)) {
            $this->idspot = $value;
            dd($value);
        }
    }
    public function render()
    {

        if ($this->idspot) {
        $this->traduction = SpotsTranslation::where('spots_id', '=', $this->idspot)
                ->where('locale', '=', app()->getlocale())
                ->first();
        }
        return view('livewire.show-video');
    }
}
