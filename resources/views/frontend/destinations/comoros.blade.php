@extends('frontend.main_master')
@section('css')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/pannellum.css') }}">
@endsection

@section('content')
<!-- Conteneur pour les images -->
<div class="image-column">
    <div id="panoramas"></div>
</div>

<script src="{{ asset('frontend/assets/js/pannellum.js') }}"></script>
<style>
    /* Définissez la largeur de la colonne à 80% */
    .image-column {
        width: 80%;
        margin: auto; /* Centre la colonne horizontalement */
    }
    /* Définissez la largeur et la hauteur des images panoramiques */
    .panorama-image {
        width: 100%;
        height: auto;
        margin-bottom: 40px; /* Espace entre chaque image */
    }
</style>
<script>
    var panoramasData = [
        { id: "panorama1", image: "{{ asset('frontend/assets/images/360-GC-Khartala1-sd.jpg') }}" },
        { id: "panorama2", image: "{{ asset('frontend/assets/images/360-GC-Khartala2-sd.jpg') }}" },
        { id: "panorama3", image: "{{ asset('frontend/assets/images/image3.jpg') }}" }
        // Ajoutez d'autres images ici au besoin
    ];

    panoramasData.forEach(function(panorama) {
        var div = document.createElement('div');
        div.id = panorama.id;
        document.getElementById('panoramas').appendChild(div);

        pannellum.viewer(div.id, {
            "type": "equirectangular",
            "panorama": panorama.image
        });
    });
</script>
@endsection
