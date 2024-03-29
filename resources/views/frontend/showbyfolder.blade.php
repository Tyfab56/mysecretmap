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
<style>
   #gallery-wrapper {
  /* display: flex; Supprimé pour éviter les conflits avec Masonry */
  justify-content: center;
  margin-left: auto;
  margin-right: auto;
  margin-top: 2.5rem; /* mt-10 */
}

.picture-item {
  position: relative;
  padding: 0.25rem; /* p-1 */
  overflow: hidden;
  width: 100%; /* Assurez-vous que la largeur par défaut est définie, peut-être ajustée par media queries */
}

/* Tailles responsives */
@media (min-width: 1024px) { /* lg */
  .picture-item {
    width: 33.333%; /* lg:w-1/3, Ajustement pour Masonry */
  }
}

@media (min-width: 640px) { /* sm */
  .picture-item {
    width: 33%; /* sm:w-1/2, Ajustement pour Masonry */
  }
}

.group img {
  border-radius: 0.375rem; /* rounded-md */
  width: 100%; /* w-full */
}

.description-box {
  position: absolute;
  bottom: -13rem; /* Ajusté pour plus de clarté */
  left: 0.5rem; /* start-2 */
  right: 0.5rem; /* end-2 */
  background-color: #ffffff; /* bg-white */
  padding: 1rem; /* p-4 */
  border-radius: 0.375rem; /* rounded */
  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); /* shadow */
  transition: all 0.5s; /* transition-all duration-500 */
}

.group:hover .description-box {
  bottom: 0.5rem; /* group-hover:bottom-2 */
}

.image-popup {
  background-color: #3490dc; /* bg-blue-500 */
  color: #ffffff; /* text-white */
  border-radius: 9999px; /* rounded-full */
  height: 2.5rem; /* h-10 */
  width: 2.5rem; /* w-10 */
  display: flex;
  align-items: center;
  justify-content: center;
}

.image-popup:hover {
  background-color: #000000; /* hover:bg-black */
}

.text-slate-600 {
  color: #718096; /* text-slate-600 */
}

.text-base {
  font-size: 1rem; /* text-base */
}

.font-medium {
  font-weight: 500; /* font-medium */
}

.text-blue-500 {
  color: #3490dc; /* text-blue-500 */
}

.text-blue-500:hover {
  color: #000000; /* hover:text-black */
}
</style>





<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/imagesloaded/4.1.4/imagesloaded.pkgd.min.js"></script>


<script>
var $grid;
$(document).ready(function() {
    $grid = $('#gallery-wrapper').imagesLoaded(function() {
    $grid.masonry({
        itemSelector: '.picture-item',
        percentPosition: true,
        columnWidth: '.picture-item' // S'assurer que cela correspond à vos éléments de grille
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


@endsection
