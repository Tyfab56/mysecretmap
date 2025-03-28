@extends('frontend.main_master')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.3/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl/1.13.1/mapbox-gl.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.Default.css" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/Control.FullScreen.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/leaflet.extra-markers.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css"
        integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.js"></script>
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/GridOverflow3D.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/pannellum.css') }}">


    <!-- Template styles-->
    <script data-cfasync="false">
        var swarmoptions = {
            swarmcdnkey: "213fbcf5-edab-4f21-a4c5-caa151d8b988",
            iframeReplacement: "iframe",
            autoreplace: {
                youtube: true
            }
        };
    </script>
    <script async data-cfasync="false" src="https://assets.swarmcdn.com/cross/swarmdetect.js"></script>
@endsection

@section('content')
    <section id="ts-features" class="ts-features">
        <div class="container">

            <div class="container">
                <div class="row mt-2 mb-2">
                    <div class="col-lg-2 mb-2 d-flex flex-column justify-content-center align-items-center">
                        <h1><a href='{{ route($pays->route) }}'>{{ $pays->getTranslatedLibelle() }}</a></h1>
                        <a class="btn btn-primary f0-7m"
                            href="{{ url('thewall') }}/{{ $idpays }}">{{ __('destination.cherchespot') }}</a>
                    </div>
                    <div class="col-lg-10 p-0">
                        @if ($spot)
                            @livewire('spot-banner', ['spotId' => $spot->id])
                        @endif
                    </div>
                </div>
            </div>
            @include('components.contest-form')
            <div class="container">
                <div class="row mt-2 mb-3">
                    <div class="col-lg-12">
                        <div class="row">
                            <!-- Affichage info sur le spot-->
                            <div class="col-lg-12 bgbox pb-2">
                                <livewire:show-map-spot />
                            </div>
                            <div class="row bgregbox">
                                <div class="col-lg-12">
                                    <p>{{ __('destination.alentours') }}</p>
                                    <div id="medias" class="mb5"></div>
                                </div>
                            </div>
                        </div>

                        <div class="p-0">
                            <div class="bgregbox w100">
                                <div class="col-lg-12">
                                    <p><b>{{ __('destination.clickmap') }}</b></p>
                                    <div style="display: flex; gap: 10px; align-items: center;">
                                        <label><input type="checkbox" id="1" name="spotType" value="1" checked>
                                            {{ __('destination.Spot') }}</label>
                                        <label><input type="checkbox" id="3" name="spotType" value="3">
                                            {{ __('destination.Musee') }}</label>
                                        <!--  <label><input type="checkbox" id="4" name="spotType" value="4"> {{ __('destination.Hotel') }}</label>
                                            <label><input type="checkbox" id="5" name="spotType" value="5"> {{ __('destination.Camping') }}</label>
                                            <label><input type="checkbox" id="6" name="spotType" value="6"> {{ __('destination.Rental') }}</label>-->
                                        <!-- Add more checkboxes as needed -->
                                    </div>
                                    <div class="leaflet-map">
                                    </div>
                                    <div class="row">
                                        <a name="mapPos" style="position:absolute; top:+100px;"></a>
                                        <div id="mapdest">
                                            <a href="https://www.maptiler.com"
                                                style="position:absolute;left:10px;bottom:10px;z-index:999;"><img
                                                    src="https://api.maptiler.com/resources/logo.svg"
                                                    alt="MapTiler logo"></a>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="checkbox" id="sunToggle" class="js-switch">
                                                <span class="p5 f0-8m">{{ __('destination.sunsetting') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="sun" class="row min100 hidden">

                                        <div class="col-sm-6">
                                            <div style="padding : 5px"><b>{{ __('destination.choiceday') }} :</b> <span
                                                    id="theday"></span></div>
                                            <div style="padding: 5px;"> <input type="range" class="form-range"
                                                    min="1" max="365" oninput="changeRange(this.value)"
                                                    onchange="changeRange(this.value)" id="dayofyear"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div style="padding : 5px"><b>{{ __('destination.choicehour') }} :</b> <span
                                                    id="thehour"></span><span id="thedayhour"></span></div>
                                            <div style="padding: 5px;"> <input type="range" class="form-range"
                                                    min="0" max="24" oninput="changeHour(this.value)"
                                                    onchange="changeHour(this.value)" id="hourofday"></div>
                                        </div>
                                        <p class="center w100"><span
                                                style="color:red"><b>{{ __('destination.RedLine') }}</b></span> / <span
                                                style="color:orange"><b>{{ __('destination.OrangeLine') }}</b></span></p>
                                        <br />
                                    </div>

                                    <div class="row pt-1 pb-1 pr-1 pl-1 bgregbox min100">
                                        <div class="col-lg-12 pt-1 pb-1  pr-1 pl-1"><livewire:hotels-nearby />
                                        </div>
                                    </div>
                                    <div class="row pt-1 pb-1 pr-1 pl-1 bgregbox min100">
                                        <div class="col-lg-12 center pt-1 pb-1 pr-1 pl-1">
                                            <livewire:show360 />
                                        </div>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {


                                                // Réinitialisation de Pannellum après chaque mise à jour de Livewire
                                                Livewire.on('spotLoaded', function(spot) {
                                                    initializePannellum();

                                                });
                                            });


                                            function initializePannellum() {
                                                const img = document.getElementById('panoImage');
                                                if (img) {
                                                    img.onload = function() {
                                                        pannellum.viewer('panorama', {
                                                            "type": "equirectangular",
                                                            "panorama": img.src,
                                                            "autoLoad": true,
                                                            "preload": true,
                                                            "autoRotate": -2,
                                                            "pitch": -30,
                                                            "hfov": 120
                                                        });
                                                    };
                                                    // Gérer le cas où l'image est déjà chargée
                                                    if (img.complete) {
                                                        img.onload();
                                                    }
                                                } else {
                                                    console.log('Image element not found');
                                                }
                                            }
                                        </script>

                                    </div>



                                    <!-- Affichage video -->
                                    <div id="wrap_video" class="row pt-1 pb-1 pr-1 pl-1 bgregbox min100">
                                        <div id="container_video"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row bgregbox min100">

            </div>
            <!-- Affichage photo du lieu -->
            <div class="row bgregbox min100">
                <div class="col-lg-12 col-md-12"><livewire:slider-pictures /></div>
            </div>

            @auth
                @if (auth()->user()->isPhotographer())
                    <div class="row bgregbox">
                        <div class="col-lg-12">
                            <a class="btn btn-primary" href="javascript:goImage()">AJOUTER DES PHOTOS A CE SPOT</a>
                        </div>
                    </div>
                @endif
            @endauth
            <div class="row min100">
                <div class="col-lg-3 col-md-12 bgbox ">
                    <h4 class="white">{{ __('destination.VosCircuits') }}</h4>
                    @auth

                        <div class="form-group">

                            <select class="form-control ml15 mw350 mauto white" id="idcircuit" name="idcircuit">
                                <option value="">{{ __('destination.SelectCircuit') }}</option>

                                @foreach ($circuits as $circuit)
                                    <option value="{{ $circuit->id }}"
                                        {{ $circuitactif == $circuit->id ? 'selected' : '' }}>{{ $circuit->titrecircuit }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endauth
                    @guest

                        <p>
                        <h6 class="white">{{ __('destination.CircuitLogin') }}</h6>
                        </p>
                        <a class="btn btn-primary mb5" href="{{ route('login') }}">{{ __('menu.Connexion') }}</a>
                    @endguest

                    <h4 class="white"> {{ __('destination.NosCircuits') }}</h4>

                </div>
                <div class="col-lg-6 col-md-12 bgbox">

                    <div class="row">
                        <livewire:show-circuit />
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 bgbox">
                </div>
            </div>



            <div id="container_video"></div>


        </div>
        </div>
        <style>
            #wrap_video {
                display: flex;
                justify-content: center;
                align-items: center;

            }

            #container_video {
                width: 100%;
                !important;

                /* Limite la largeur à 640px si nécessaire */
                margin: 0 auto;
                /* Centre le conteneur */
            }

            .smartvideo-player {
                position: relative !important;
                padding-top: 56.25% !important;
                /* Ratio 16:9 */
                height: 0 !important;
                width: 100% !important;
            }

            .smartvideo-player video {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }


            /* Pour les navigateurs WebKit (Chrome, Safari, Opera) */
            input[type="range"]::-webkit-slider-runnable-track {
                width: 100%;
                height: 8px;
                /* Ajustez la hauteur selon vos besoins */
                background: #d3d3d3;
                /* Gris clair */
                border-radius: 5px;
                border: none;
            }

            /* Pour Firefox */
            input[type="range"]::-moz-range-track {
                width: 100%;
                height: 8px;
                /* Ajustez la hauteur selon vos besoins */
                background: #d3d3d3;
                /* Gris clair */
                border-radius: 5px;
                border: none;
            }

            /* Pour Internet Explorer */
            input[type="range"]::-ms-track {
                width: 100%;
                height: 8px;
                /* Ajustez la hauteur selon vos besoins */
                background: #d3d3d3;
                /* Gris clair */
                border-radius: 5px;
                border: none;
            }

            .hotel-card {
                flex: none;
                width: 20%;
                min-width: 200px !important;
                /* Largeur minimale pour chaque carte d'hôtel */
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                margin: 10px;
                background-color: #ffffff;
            }

            /* Pour les petits écrans (jusqu'à 600px) */
            @media (max-width: 600px) {
                .hotel-card {
                    width: 80%;
                    /* Occupe 80% de la largeur de l'écran */
                }
            }

            /* Pour les écrans moyens (601px à 900px) */
            @media (min-width: 601px) and (max-width: 900px) {
                .hotel-card {
                    width: 45%;
                    /* Occupe 45% de la largeur de l'écran */
                }
            }

            /* Pour les grands écrans (plus de 900px) */
            @media (min-width: 901px) {
                .hotel-card {
                    width: 20%;
                    /* Occupe 20% de la largeur de l'écran */
                }
            }
        </style>



    </section>
@endsection
@section('fullscripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.3/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl/1.13.1/mapbox-gl.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl-leaflet/0.0.15/leaflet-mapbox-gl.min.js"></script>

    <script src="{{ asset('frontend/assets/js/Control.FullScreen.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/leaflet-semicircle.js') }}"></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js"></script>
    <script src="{{ asset('frontend/assets/js/leaflet.extra-markers.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/polyline-encoder.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/suncalc/1.9.0/suncalc.min.js"></script>
    <script src="{{ asset('frontend/assets/js/intense.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"
        integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/zooming/build/zooming.min.js"></script>
    <script src="{{ asset('frontend/assets/js/pannellum.js') }}"></script>
@endsection

@section('scripts')
    @include ('frontend.mapdestinationjs');


    document.getElementById('sunToggle').addEventListener('change', function() {
    var sunDiv = document.getElementById('sun');
    sunDiv.classList.toggle('hidden', !this.checked);
    });

    document.addEventListener('click', function(event) {
    if (event.target.id === 'see-more') {
    event.preventDefault();
    document.getElementById('short-text').style.display = 'none';
    document.getElementById('full-text').style.display = 'inline';
    event.target.style.display = 'none';
    }
    });
@endsection
