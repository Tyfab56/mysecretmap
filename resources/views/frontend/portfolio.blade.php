@extends('frontend.main_master')

@section('content')
<div class="container">
    <h1>Portfolio de Médias</h1>

    <form action="{{ route('portfolio.index') }}" method="GET" class="mb-4">
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <input type="text" name="search" placeholder="Rechercher par titre..." value="{{ request('search') }}" class="form-control">
        </div>
        <div class="col-md-3 mb-3">
            <select name="pays_id" class="custom-select" onchange="this.form.submit()">
                <option value="">Sélectionnez un pays</option>
                @foreach($activePays as $pays)
                    <option value="{{ $pays->pays_id }}" {{ (request('pays_id') == $pays->pays_id) ? 'selected' : '' }}>{{ $pays->pays }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <select name="media_type" class="custom-select" onchange="this.form.submit()">
                <option value="">Sélectionnez un type de média</option>
                <option value="photo" {{ (request('media_type') == 'photo') ? 'selected' : '' }}>Photo</option>
                <option value="video" {{ (request('media_type') == 'video') ? 'selected' : '' }}>Vidéo</option>
                <option value="film" {{ (request('media_type') == 'film') ? 'selected' : '' }}>Film</option>
            </select>
        </div>
        <div class="col-md-2 mb-3">
            <button type="submit" class="btn btn-primary btn-block">Filtrer</button>
        </div>
    </div>
</form>


<div class="gallery-wrapper" id="gallery-wrapper">
        @foreach ($shareMedias as $media)
                    <div class="picture-item" data-groups="{{ $media->media_type }}">
                    <img src="{{ $media->thumbnail_link }}" alt="{{ $media->title }}" class="media-thumbnail" data-id="{{ $media->id }}" onclick="openModal(this)">
                        @if ($media->media_type === 'video' || $media->media_type === 'film')
                            <video class="media-video" preload="none" style="display: none;">
                                <source src="{{ $media->preview_link }}" type="video/mp4">
                                Votre navigateur ne supporte pas la balise vidéo.
                            </video>
                        @endif
                        <div class="info">
                            <h5>{{ $media->title }}</h5>
                            <p>{{ ucfirst($media->media_type) }} - {{ $media->width }} x {{ $media->height }}</p>
                        </div>
                    </div>
                @endforeach
    </div>

    <div class="mt-4">
        {{ $shareMedias->links() }}
    </div>
</div>
<div id="mediaModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
</div>
<style>
 
    .form-control, .custom-select {
        max-width: 100%;
    }
    .btn-primary {
        background-color: #0056b3; /* Couleur principale de votre thème */
    }
    .gallery-wrapper {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 10px;
}

.picture-item {
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 200px; /* Hauteur fixe pour tous les éléments */
}

.picture-item img, .picture-item video {
    width: 100%;
    max-height: 100%;
    object-fit: contain; /* Assure que tout le contenu de l'image est visible */
}

.media-video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: none;
}

.info {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    background: rgba(0, 0, 0, 0.5); /* Fond semi-transparent pour la lisibilité */
    color: white;
    text-align: center;
    padding: 10px;
}
/* Responsive adjustments */
@media (max-width: 1200px) { /* Taille moyenne */
    .gallery-wrapper {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 768px) { /* Taille des tablettes */
    .gallery-wrapper {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 480px) { /* Taille des téléphones mobiles */
    .gallery-wrapper {
        grid-template-columns: 1fr; /* 1 colonne pour les très petits écrans */
    }
}


</style>
@endsection
@section('fullscripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
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

    function openModal(imageElement) {
    var modal = document.getElementById('mediaModal');
    var modalImg = document.getElementById('img01');
    var captionText = document.getElementById('caption');

    modal.style.display = "block";
    modalImg.src = imageElement.src;  // Utilisez directement l'attribut src de l'image cliquée
    captionText.innerHTML = imageElement.alt;  // Utilisez l'attribut alt de l'image pour le titre

    // Ajout des gestionnaires pour fermer le modal
    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
        modal.style.display = "none";
    }
}


</script>
@endsection
