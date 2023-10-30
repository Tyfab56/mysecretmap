<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CharlyPost;

class AfficherCharly extends Component
{

    public $charlyPost;
    public $shouldRender = false;

    protected $listeners = ['ImgRegion' => 'handleImgRegion'];

    public function AfficheVideo($idSpot)
    {
        $locale = app()->getLocale();

        // Vérifie si un post avec la locale spécifiée et l'idSpot existe.
        $this->charlyPost = CharlyPost::whereHas('translations', function ($query) use ($locale, $idSpot) {
            $query->where('locale', $locale);
        })->find($idSpot);

        // Si un post est trouvé, on doit rendre le composant, sinon non.
        $this->shouldRender = !is_null($this->charlyPost);
    }
    public function render()
    {
        if ($this->shouldRender) {
            return view('livewire.afficher-charly');
        }

        return ''; // Ne rien rendre si le post n'existe pas
    }
}
