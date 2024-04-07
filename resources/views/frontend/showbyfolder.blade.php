
    @extends('frontend.main_master')

    @section('content')
    <div class="container">
        <h4>{{ __('sharemedia.titre') }} : {{ $folder->name }}</h4>
    @if(Request::route()->getName() == 'show-folder')
    @include('partials.navmedias')
    @endif
    <input type="hidden" id="folderId" value="{{ $folder->id }}" />
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
                    <a href="{{ route('show-folder', ['folderId' => $folder->id, 'type' => 'photo']) }}" class="btn btn-primary">
                {{ __('sharemedia.photos') }} <span class="badge badge-light">{{ $photosCount }}</span>
            </a>
            <a href="{{ route('show-folder', ['folderId' => $folder->id, 'type' => 'video']) }}" class="btn btn-primary">
                {{ __('sharemedia.videos') }} <span class="badge badge-light">{{ $videosCount }}</span>
            </a>
            <a href="{{ route('show-folder', ['folderId' => $folder->id, 'type' => 'film']) }}" class="btn btn-primary">
                {{ __('sharemedia.films') }} <span class="badge badge-light">{{ $filmsCount }}</span>
            </a>

            </div>
        
    
        <div id="gallery-wrapper" class="gallery-wrapper">
        <div class="lds-roller" id="loading-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>

        @foreach($shareMedias as $media)
        
                
                <div class="picture-item" data-groups='{{ $media->media_type }}'>
                    <div class="group">
                    <div class="ml-2 overlay-text">{{ $media->width }} x {{ $media->height }}</div>
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
    float: left; /* Ensure items line up horizontally */
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
    .overlay-text {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    background-color: rgba(0, 0, 0, 0); /* Fond semi-transparent noir */
    color: white; /* Couleur du texte */
    padding: 5px; /* Espacement autour du texte */
    font-size: 0.9em; /* Taille du texte */
    z-index: 2; /* S'assurer que le texte reste au-dessus de l'image/vidéo */
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

    .lds-roller {
  display: inline-block;
  position: fixed; /* Utilisez fixed pour le centrer sur la fenêtre */
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 80px;
  height: 80px;
  color: #1c4c5b; /* Couleur des points du spinner */
  z-index: 1050; /* Assurez-vous qu'il est au-dessus d'autres éléments */
}

.lds-roller div,
.lds-roller div:after {
  box-sizing: border-box;
}

.lds-roller div {
  animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  transform-origin: 40px 40px;
}

.lds-roller div:after {
  content: " ";
  display: block;
  position: absolute;
  width: 7.2px;
  height: 7.2px;
  border-radius: 50%;
  background: currentColor;
  margin: -3.6px 0 0 -3.6px;
}

.lds-roller div:nth-child(1) { animation-delay: -0.036s; }
.lds-roller div:nth-child(1):after { top: 62.62742px; left: 62.62742px; }
.lds-roller div:nth-child(2) { animation-delay: -0.072s; }
.lds-roller div:nth-child(2):after { top: 67.71281px; left: 56px; }
.lds-roller div:nth-child(3) { animation-delay: -0.108s; }
.lds-roller div:nth-child(3):after { top: 70.90963px; left: 48.28221px; }
.lds-roller div:nth-child(4) { animation-delay: -0.144s; }
.lds-roller div:nth-child(4):after { top: 72px; left: 40px; }
.lds-roller div:nth-child(5) { animation-delay: -0.18s; }
.lds-roller div:nth-child(5):after { top: 70.90963px; left: 31.71779px; }
.lds-roller div:nth-child(6) { animation-delay: -0.216s; }
.lds-roller div:nth-child(6):after { top: 67.71281px; left: 24px; }
.lds-roller div:nth-child(7) { animation-delay: -0.252s; }
.lds-roller div:nth-child(7):after { top: 62.62742px; left: 17.37258px; }
.lds-roller div:nth-child(8) { animation-delay: -0.288s; }
.lds-roller div:nth-child(8):after { top: 56px; left: 12.28719px; }

@keyframes lds-roller {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.disabled-button {
    opacity: 0.5; /* Réduit l'opacité pour indiquer que le bouton est désactivé */
    cursor: not-allowed; /* Change le curseur pour indiquer que le bouton est désactivé */
}

    </style>










    <script>
  
    $(document).ready(function() {

    document.getElementById("submit-button").addEventListener("click", function() {
        // Désactiver le bouton
        this.disabled = true;
        // Ajouter une classe pour styliser le bouton désactivé (facultatif)
        this.classList.add("disabled-button");
    });

    var $gallery = $('#gallery-wrapper').imagesLoaded(function() {
        // Initialiser Masonry après que les images ont été chargées
        $('#loading-spinner').hide();
        $gallery.masonry({
            itemSelector: '.picture-item',
            percentPosition: true
        });
    });

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
