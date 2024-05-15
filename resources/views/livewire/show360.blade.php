<div>
    @if($spot && !is_null($spot->img360))
    <!-- L'image est préchargée ici pour s'assurer qu'elle est chargée sans afficher -->
    <img id="panoImage" src="{{ $spot->img360 }}" style="display: none;">

    <!-- Conteneur pour Pannellum -->
    <div id="panorama" wire:ignore style="width: 100%; height: 500px;"></div>
    @endif
</div>