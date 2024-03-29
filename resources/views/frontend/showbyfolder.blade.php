@extends('frontend.main_master')

@section('content')
<div class="container">
    <h1>Médias du dossier : {{ $folder->name }}</h1>
    
    <div class="media-filters">
        <button class="filter-button" data-filter="*">Tous</button>
        <button class="filter-button" data-filter="photo">Photos</button>
        <button class="filter-button" data-filter="video">Vidéos</button>
        <button class="filter-button" data-filter="film">Films</button>
    </div>
    
  
    <div id="gallery-wrapper" class="gallery-wrapper">
    @foreach($folder->shareMedias as $media)
    
      
            <div class="picture-item" data-groups='{{ $media->media_type }}'>
                <div class="group">
                <img src="{{ $media->thumbnail_link }}" alt="{{ $media->title }}" class="rounded-md w-full">
                    <div class="description-box">
                        <div class="icon-wrapper">
                            <a href="{{ $media->thumbnail_link }}" class="image-popup"><i class="fa-solid fa-camera"></i></a>
                        </div>
                        <div>
                            <p class="category-text">Choisir ce médias</p>
                            <a href="#" class="title-link">{{ $media->title }}</a>
                        </div>
                    </div>
                </div>
            </div>
     




        @endforeach
        </div>
</div>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/imagesloaded/4.1.4/imagesloaded.pkgd.min.js"></script>
<script>

$(document).ready(function() {
    var $grid = $('#gallery-wrapper').imagesLoaded(function() {
        // Initialise Masonry après le chargement de toutes les images
        $grid.masonry({
            itemSelector: '.picture-item',
            percentPosition: true
        });
    });

    // Filtrer les éléments lors d'un clic sur un bouton
    $('.media-filters').on('click', '.filter-button', function() {
        var filterValue = $(this).attr('data-filter');

        // Afficher tous les éléments si le filtre est "*"
        if (filterValue == '*') {
            $grid.masonry('layout');
        } else {
            // Sinon, masquer tous les éléments qui ne correspondent pas au filtre et afficher ceux qui correspondent
            $('#gallery-wrapper .picture-item').each(function() {
                if ($(this).data('groups') == filterValue || filterValue == '*') {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            $grid.masonry('layout');
        }
    });
});
</script>


@endpush
