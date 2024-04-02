use Illuminate\Support\Facades\Request;
@extends('frontend.main_master')

@section('content')
<div class="container">
    <h4>{{ __('sharemedia.titre') }} : {{ $folder->name }}</h4>
@if(Request::route()->getName() == 'show-folder')
@include('partials.navmedias')
@endif

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
        <button class="filter-button" data-filter="*">{{ __('sharemedia.all') }}</button>
        <button class="filter-button" data-filter="photo">{{ __('sharemedia.photos') }}</button>
        <button class="filter-button" data-filter="video">{{ __('sharemedia.videos') }}</button>
        <button class="filter-button" data-filter="film">{{ __('sharemedia.films') }}</button>
    </div>
    
  
    <div id="gallery-wrapper" class="gallery-wrapper">
    @foreach($folder->shareMedias as $media)
    
            <div class="picture-item" data-groups='{{ $media->media_type }}'>
                <div class="media-icon">
                    @switch($media->media_type)
                        @case('photo')
                            <i class="fas fa-image"></i> {{-- Icône pour les photos --}}
                            @break
                        @case('video')
                           <i class="fas fa-folder"></i> {{-- Icône pour les vidéos --}}
                            @break
                        @case('film')
                            <i class="fas fa-film"></i> {{-- Icône pour les films --}}
                            @break
                    @endswitch
                </div>
                {{-- Votre code existant pour afficher le média --}}
            </div>
            <div class="picture-item" data-groups='{{ $media->media_type }}'>
                <div class="group">

                    @if($media->media_type == 'video')
                        <!-- Thumbnail -->
                        <img src="{{ $media->thumbnail_link }}" alt="{{ $media->title }}" class="media-thumbnail">
                        
                        <!-- Video Preview -->
                        <video class="media-video" muted preload="none" style="display: none;">
                            <source src="{{ $media->preview_link }}" type="video/mp4">
                            Votre navigateur ne supporte pas la balise vidéo.
                        </video>
                    @else
                        <img src="{{ $media->thumbnail_link }}" alt="{{ $media->title }}" class="media-thumbnail">
                    @endif
              
                    <div class="description-box">
                       
                        <div>
                        @if(in_array($media->id, $purchasedMediaIds))
                                {{-- Le média a déjà été acheté --}}
                                <a href="{{ route('media.download', $media->id) }}" class="btn btn-success">{{ __('sharemedia.download') }}</a>
                            @elseif($userCredits->where('media_type', $media->media_type)->first()->credits ?? 0 > 0)
                                {{-- L'utilisateur a suffisamment de crédits pour acheter le média --}}
                                <form action="{{ route('sharemedia.order', $media->id) }}" method="POST">
                                    @csrf                                   
                                    <button type="submit" class="btn btn-primary">{{ __('sharemedia.buy') }}</button>
                                </form>
                            @else
                                {{-- L'utilisateur n'a pas suffisamment de crédits --}}
                                <a href="{{ route('credits.purchase') }}" class="btn btn-warning">{{ __('sharemedia.get') }}</a>
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
    bottom: -13rem;
    left: 0.5rem;
    right: 0.5rem;
    background-color: rgba(255, 255, 255, 0.8);
    padding: 0.5rem; /* Padding réduit */
    border-radius: 0.375rem;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    transition: all 0.5s;
    max-height: 80px; /* Hauteur maximale spécifiée */
    overflow: auto; /* Permet le défilement */
}

.description-box .text-slate-600, .description-box .text-base, .description-box .font-medium, .description-box a {
    font-size: 0.75rem;
    margin-bottom: 0.25rem;
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
.media-content {
    position: relative;
}

.media-video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: none; /* Masquée par défaut */
}

.media-thumbnail {
    width: 100%;
    display: block; /* Assure que l'image remplit l'espace */
}
.picture-item {
    position: relative;
    /* Votre CSS existant */
}

.media-icon {
    position: absolute;
    top: 0;
    right: 0;
    padding: 10px; /* Ajustez selon vos besoins */
    color: #fff; /* Couleur de l'icône, ajustez selon le fond */
}
.group img, .media-video {
    border-radius: 0.375rem; /* rounded-md */
    width: 100%; /* Assure que l'image/vidéo remplit l'espace */
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


document.addEventListener("DOMContentLoaded", function() {
    const mediaItems = document.querySelectorAll('.picture-item');

    mediaItems.forEach(item => {
        const video = item.querySelector('.media-video');
        const image = item.querySelector('.media-thumbnail');

        if (video) {
            item.addEventListener('mouseover', () => {
                video.style.display = 'block';
                video.play();
            });

            item.addEventListener('mouseout', () => {
                video.style.display = 'none';
                video.pause();
                video.currentTime = 0;
            });
        }
    });
});


</script>


@endsection
@section('fullscripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
<script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
@endsection
