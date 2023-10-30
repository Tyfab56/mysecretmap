<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CharlyPost;

class AfficherCharly extends Component
{

    public $charlyPost;
    public $shouldRender = false;

    protected $listeners = [
        'AfficheVideo'
    ];


    public function AfficheVideo($idspot)
    {
        $locale = app()->getLocale();
  
        $this->charlyPost = CharlyPost::first();

        dd($this->charlyPost);
        
       // whereHas('translations', function ($query) use ($locale) {
       //     $query->where('locale', $locale);
       // })->where('spot_id', $idspot)->first();

        $this->shouldRender = !is_null($this->charlyPost);
    }

    public function render()
    {
        if ($this->shouldRender) {
            return view('livewire.afficher-charly');
        }

        return ''; 
    }
}
