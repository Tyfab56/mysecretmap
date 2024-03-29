@extends('frontend.main_master')

@section('content')
<div class="container">
    <h4>{{ __('sharemedia.titre') }} : {{ $folder->name }}</h4>

<div class="container">
    <h4>{{ __('sharemedia.creditdispo') }}</h4>
    <div class="d-flex justify-content-start align-items-center mb-4">
        <div class="mr-3">
            <span class="font-weight-bold">{{ __('sharemedia.photos') }} :</span>
            <span class="badge badge-primary">{{ $userCredits->where('media_type', 'photo')->first()->credits ?? '0' }}</span>
        </div>
        <div class="mr-3">
            <span class="font-weight-bold">{{ __('sharemedia.videos') }}:</span>
            <span class="badge badge-success">{{ $userCredits->where('media_type', 'video')->first()->credits ?? '0' }}</span>
        </div>
        <div>
            <span class="font-weight-bold">{{ __('sharemedia.films') }} :</span>
            <span class="badge badge-danger">{{ $userCredits->where('media_type', 'film')->first()->credits ?? '0' }}</span>
        </div>
    </div>
    
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
                       
                        <div>
                                @if($userCredits->where('media_type', $media->type)->first()->credits ?? 0 > 0)
                                <form action="{{ route('media.order', $media->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Commander avec 1 crédit</button>
                                </form>
                            @else
                                <a href="" class="btn btn-warning">Acheter des crédits</a>
                            @endif
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

$('.media-filters').on('click', '.filter-button', function() {
        var filterValue = $(this).attr('data-filter');

        // Afficher tous les éléments si le filtre est "*"
        if (filterValue == '*') {
            // Montrer tous les éléments
            $('.picture-item').show();
        } else {
            // Sinon, masquer tous les éléments qui ne correspondent pas au filtre et afficher ceux qui correspondent
            $('#gallery-wrapper .picture-item').each(function() {
                if ($(this).data('groups') == filterValue) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
        // Relancer le layout Masonry après le filtrage
        $grid.masonry('layout');
    });
});
</script>


@endsection
@section('fullscripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
<script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
@endsection
