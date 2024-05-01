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
                    <img src="{{ $media->thumbnail_link }}" alt="{{ $media->title }}" class="media-thumbnail" data-id="{{ $media->id }}" data-type="{{ $media->media_type }}" onclick="openModal(this)">
                        @if ($media->media_type === 'video' || $media->media_type === 'film')
                            <video class="media-video" preload="none" style="display: none;" alt="{{ $media->title }}" onclick="openModal(this)">
                                <source src="{{ $media->preview_link }}" type="video/mp4">
                                Votre navigateur ne supporte pas la balise vidéo.
                            </video>
                        @endif
                        <div class="info">
                            <p class="f0-8m">{{ ucfirst($media->media_type) }} - {{ $media->title }} -  {{ $media->width }} x {{ $media->height }}</p>
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
    <div id="modalContent" class="modal-content">
        <img id="img01" style="display: none;">
        <div id="videoContainer" style="display: none;">
            <video id="modalVideo" controls autoplay style="display: none;">
                <source src="" type="video/mp4">
                Votre navigateur ne supporte pas la balise vidéo.
            </video>
        </div>
        <div id="caption"></div>
    </div>
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
/* Style pour le fond obscurci */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1000; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Style pour le contenu du modal */
.modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border: 1px solid #888;
    width: 60%; /* Could be more or less, depending on screen size */
    max-width: 800px; /* Optional: for large screens */
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    animation-name: zoom;
    animation-duration: 0.6s;
}

#videoContainer {
    position: relative; /* Ajouter cette propriété pour que les éléments enfants soient positionnés par rapport à ce conteneur */
    display: none; /* Pour cacher par défaut */
}

#videoContainer video {
    max-width: 100%;
    height: auto;
}

/* Ajouter une animation de zoom pour l'apparition du contenu vidéo dans le modal */
#videoContainer video {
    animation-name: zoom; /* Utiliser l'animation de zoom */
    animation-duration: 0.6s;
}





/* Style pour la fermeture du modal */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #aaa;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}


</style>
@endsection
@section('fullscripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const modal = document.getElementById('mediaModal');
        const modalContent = document.querySelector('.modal-content');

            // Ferme le modal si l'utilisateur clique en dehors du contenu du modal
            modal.addEventListener('click', function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            });

            // Ferme le modal si l'utilisateur clique sur la croix
            var span = document.getElementsByClassName("close")[0];
            span.onclick = function() {
                modal.style.display = "none";
            }

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

    function openModal(element) {
      
    const modal = document.getElementById('mediaModal');
    const modalImg = document.getElementById('img01');
    const modalVideo = document.getElementById('modalVideo');
    const modalVideoContainer = document.getElementById('videoContainer');  // Conteneur pour la vidéo dans le modal
    const captionText = document.getElementById('caption');
    var altText;
    
    // Nettoyer le contenu précédent du modal
    modalVideo.src = '';

    // Déterminer si l'élément cliqué est une image ou une vidéo
    if (element.tagName.toLowerCase() === 'img') {
        modalImg.src = element.src;  // Utiliser directement l'attribut src de l'image cliquée
        modalImg.style.display = 'block';
        modalVideoContainer.style.display = 'none';
        altText = element.alt;
    } else if (element.tagName.toLowerCase() === 'video') {
        modalImg.style.display = 'none';
        modalVideo.controls = true;
        modalVideo.autoplay = true;
        
        modalVideo.src = element.querySelector('source').src; // Modifier la source de la vidéo
        altText = element.getAttribute('alt');

    }

    captionText.innerHTML = altText || 'No title available';
    modal.style.display = "block";  // Afficher le modal
    if (element.tagName.toLowerCase() === 'video') 
    {
        modalVideo.style.display = 'block';
        modalVideoContainer.style.display = 'block';
    }
    // Ajout des gestionnaires pour fermer le modal
    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
        modal.style.display = "none";
    }
}


</script>
@endsection
