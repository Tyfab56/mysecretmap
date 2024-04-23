@extends('frontend.main_master')
@section('css')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/pannellum.css') }}">
@endsection

@section('content')
<h6>Cliquez sur les images pour changer d'angle de vue</h6>
<div class="image-column">
    <div id="panoramas" style="width: 100%; height: 100%;"></div>
</div>
<br>
<p class="mb5"></p>
<script src="{{ asset('frontend/assets/js/pannellum.js') }}"></script>
<style>
 .image-column {
        width: 80%;
        margin: auto;
        min-height: 400px;
        overflow-y: auto;
    }
    .panorama-container {
        width: 100%;
        height: 500px;
        margin-bottom: 40px;
    }
    .panorama-title {
        font-size: 20px;
        font-weight: bold;
        color: #333;
        padding: 10px 0;
    }
</style>
<script>
    var panoramasData = [
        { id: "panorama1", image: "{{ asset('frontend/assets/images/360-GC-Khartala1-sd.jpg') }}", title: "Pentes du Karthala" },
        { id: "panorama2", image: "{{ asset('frontend/assets/images/360-GC-Khartala2-sd.jpg') }}", title: "Cratère du Karthala" },
        { id: "panorama3", image: "{{ asset('frontend/assets/images/360-GC-Mangrove1-sd.jpg') }}", title: "Mangrove Aeroport" },
        { id: "panorama4", image: "{{ asset('frontend/assets/images/360-GC-crateresud1-sd.jpg') }}", title: "Cratère" },
       
        // Ajoutez d'autres images ici au besoin
    ];

    panoramasData.forEach(function(panorama) {
            var container = document.createElement('div');
            container.className = 'panorama-container';
            
            var title = document.createElement('div');
            title.className = 'panorama-title';
            title.textContent = panorama.title;
            container.appendChild(title);
            
            var div = document.createElement('div');
            div.style.width = '100%';
            div.style.height = '100%';
            container.appendChild(div);
            
            document.getElementById('panoramas').appendChild(container);

            pannellum.viewer(div, {
                "type": "equirectangular",
                "panorama": panorama.image,
                "autoLoad": true,
                "preload": true,
                "autoRotate": -2,
                "pitch" : -30,
                "hfov": 120  // Ajustez cette valeur pour contrôler le zoom initial
            });
        });
    
</script>
@endsection
