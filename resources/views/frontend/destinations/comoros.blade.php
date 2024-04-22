@extends('frontend.main_master')
@section ('fullscripts')
<script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.3/dist/pannellum.js"></script>
@endsection
@section('content')
<!-- Conteneur pour les images -->
<div id="panoramas" style="display: flex; flex-wrap: wrap;"></div>

<script>
    var panoramasData = [
        { id: "panorama1", image: "{{ asset('frontend/assets/images/360-GC-Khartala1-sd.jpg')}}" },
        { id: "panorama2", image: "{{ asset('frontend/assets/images/360-GC-Khartala2-sd.jpg')}}" },
        { id: "panorama3", image: "image3.jpg" }
        // Ajoutez d'autres images ici au besoin
    ];

    panoramasData.forEach(function(panorama) {
        var div = document.createElement('div');
        div.id = panorama.id;
        div.style.width = "400px";
        div.style.height = "300px";
        document.getElementById('panoramas').appendChild(div);

        pannellum.viewer(panorama.id, {
            "type": "equirectangular",
            "panorama": panorama.image
        });
    });
</script>


@endsection