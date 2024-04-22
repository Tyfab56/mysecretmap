@extends('frontend.main_master')
@section('css')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/pannellum.css') }}">
@endsection

@section('content')
<!-- Conteneur pour les images -->
<div class="image-column">
    <div id="panoramas" style="width: 100%; height: 100%;"></div>
</div>

<script src="{{ asset('frontend/assets/js/pannellum.js') }}"></script>
<style>
    /* Définissez la largeur de la colonne à 80% et la hauteur minimale pour éviter hauteur à 0 */
    .image-column {
        width: 80%;
        height: 80vh; /* Ajustez ceci selon les besoins pour maintenir la proportion */
        margin: auto; /* Centre la colonne horizontalement */
        overflow-y: auto;
    }
    /* Définissez la largeur et la hauteur des div pour Pannellum pour couvrir tout le conteneur */
    #panoramas {
        width: 100%;
        height: 100%;
    }
</style>
<script>
    var panoramasData = [
        { id: "panorama1", image: "{{ asset('frontend/assets/images/360-GC-Khartala1-sd.jpg') }}" },
        { id: "panorama2", image: "{{ asset('frontend/assets/images/360-GC-Khartala2-sd.jpg') }}" },
        { id: "panorama3", image: "{{ asset('frontend/assets/images/image3.jpg') }}" }
        // Ajoutez d'autres images ici au besoin
    ];

    document.addEventListener('DOMContentLoaded', function() {
        panoramasData.forEach(function(panorama) {
            var div = document.createElement('div');
            div.id = panorama.id;
            div.style.width = '100%';
            div.style.height = '100%';
            document.getElementById('panoramas').appendChild(div);

            pannellum.viewer(div.id, {
                "type": "equirectangular",
                "panorama": panorama.image,
                autoLoad: true,
                preload: true
            });
        });
    });
</script>
@endsection
