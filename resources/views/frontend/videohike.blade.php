@extends('frontend.main_master')
@section('content')
<section id="ts-features" class="ts-features">
        <div class="testimonial-card">
        <div style="display: flex; gap: 1rem; /* space-x-4 */">
          <img src="{{ asset('frontend/assets/images/pierre250.png')}}" alt="Portrait of Aliya, a client, wearing sunglasses and a floral outfit">
          <div style="display: flex; flex-direction: column; justify-content: center;">
            <p class="name">{{__('index.pierreguide')}}</p>
            <p class="title">{{__('index.randonnez')}}</p>
          </div>
        </div>
        <div style="margin-top: 1rem; /* mt-4 */">
          <p>{{__('index.pierrerando')}}</p>
        </div>
      </div>
</section>
<style>

  .testimonial-card {
    background-color: #ffffff; /* bg-white */
    padding: 1.5rem; /* p-6 */
    border-radius: 0.5rem; /* rounded-lg */
    color: #1f2937; /* text-gray-800 */
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
    max-width: 38rem; /* max-w-lg */
    margin-left: auto;
    margin-right: auto;
    margin-top: 2.5rem; /* my-10 */
    margin-bottom: 2.5rem;
  }
  .testimonial-card img {
    width: 8rem; /* w-24 */
    height: 8rem; /* h-24 */
    border-radius: 9999px; /* rounded-full */
    border: 0.5rem solid #facc15; /* border-4 border-yellow-300 */
  }
  .testimonial-card .name {
    font-weight: 600; /* font-semibold */
    font-size: 1.125rem; /* text-lg */
  }
  .testimonial-card .title {
    color: #d97706; /* text-yellow-500 */
  }
  .testimonial-card p {
    color: #4b5563; /* text-gray-600 */
  }
  .video-center {
    display: flex;
    justify-content: center; /* Centre horizontalement */
    align-items: center; /* Centre verticalement */
    height: 100vh; /* Exemple de hauteur, ajustez selon le besoin */
}
.video-container {
    position: relative;
    width: 640px; /* Assurez-vous que cela correspond à la largeur de votre vidéo */
    height: 360px; /* Assurez-vous que cela correspond à la hauteur de votre vidéo */
}

.video-container video {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Assurez-vous que la vidéo couvre tout le conteneur */
}

.video-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    color: white; /* Couleur du texte */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.5); /* Fond semi-transparent pour la lisibilité */
}
</style>

<div class="container video-center">
    <div id="container_video">
        {{-- Le lecteur vidéo sera inséré ici --}}
    </div>
    <div class="video-overlay">
        <h3>Titre de la Randonnée</h3>
        <p>Description de la randonnée...</p>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {

    const video = document.getElementById('main_video');
    const overlay = document.querySelector('.video-overlay');

    overlay.addEventListener('click', function() {
        // Vérifie si la vidéo est déjà en train de jouer
        if (video.paused) {
            video.play();
            overlay.style.display = 'none'; // Cache l'overlay après avoir cliqué pour jouer
        } else {
            video.pause(); // Optionnel : permet de mettre la vidéo en pause si elle est déjà en lecture
        }
    });


    const videoLink = "{{ $latestVideoLink }}";
    const containerVideo = document.getElementById('container_video');
    
    containerVideo.innerHTML = '<div id="main_video" src="'+ videoLink + '"  width="640" height="360"  controls="controls" preload="auto"></div>';
            swarmify.swarmifyVideo("main_video",{
            width: '640px',
            poster: "{{ asset('frontend/assets/images/pierre250.png')}}"
              });
    })

</script>

@endsection