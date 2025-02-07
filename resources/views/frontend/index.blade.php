@extends('frontend.main_master')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.3/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl/1.13.1/mapbox-gl.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.Default.css" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/Control.FullScreen.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/leaflet.extra-markers.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/GridOverflow3D.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/pannellum.css') }}">
@endsection


@section('content')
    <section id="news" class="news">
        <div class="container">
            <div class="section-main-title main-title">
                <h2>Nous ne vendons pas des guides<br>
                    <strong>nous vendons le frisson de l’exploration sans se perdre</strong>
                </h2>
            </div>

        </div>
    </section>

    <section id="section-1" class="video-section  wow fadeIn">
        <div class="container video-section--box">

            <div class="video-section--box-content">
                <p class="tagline">
                    Explorez nos destinations </p>
                <h1>VOYAGEZ AVEC VOS OREILLES <br><strong>
                        <AUDIOGUIDE ISLANDE</strong>
                </h1>
                <h4>Découvrez pourquoi nos guides sont si populaires</h4>

                <div class="video-section--box-content-links">
                    <a href="https://overlandsummers.com/request-a-catalog/" class="btn button secondary-button"
                        target="_self">
                        VOIR LES GUIDES </a>
                    <button class="button transparent-button popmake-1554">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_3545_7819)">
                                <path
                                    d="M0.0781789 8.46428C0.0636357 3.75032 3.86348 -0.122444 8.4472 0.00296242C12.6822 0.121705 16.3846 3.76365 16.3666 8.52698C16.3587 10.7764 15.4928 12.9304 13.9599 14.5153C12.4271 16.1001 10.3524 16.9859 8.19241 16.9774C6.03245 16.9692 3.96412 16.0674 2.44232 14.4711C0.92052 12.8747 0.0703256 10.7137 0.0781789 8.46428ZM12.1121 8.61331C12.0062 8.46004 11.882 8.3216 11.7424 8.20104C10.1136 7.19446 8.4792 6.19605 6.8396 5.20552C6.43064 4.95622 6.10488 5.131 6.10488 5.61748C6.08859 7.62369 6.08859 9.62989 6.10488 11.6361C6.10488 12.1262 6.43064 12.3146 6.83785 12.0653C8.49054 11.0702 10.1368 10.0637 11.7764 9.04587C11.8968 8.96621 11.9687 8.79324 12.1135 8.61331H12.1121Z"
                                    fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_3545_7819">
                                    <rect width="16.2884" height="16.9775" fill="white" transform="translate(0.078125)" />
                                </clipPath>
                            </defs>
                        </svg>
                        <span>
                            Watch our video </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="iframe-wrapper">
            <video playsinline autoplay loop muted poster="https://assets.overlandsummers.com/HomeBanner.jpg">
                <source src="https://mysecretmap.com/frontend/assets/images/webtrailer.mp4" type="video/mp4" />
            </video>
        </div>
    </section>
    </section id="features" class="news">
    <div class="container">
        <!--
                                    <div class="row text-center">
                                        <div class="col-lg-6 col-md-12 d-flex flex-column justify-content-center">
                                            <h2 class="section-sub-title">{{ __('index.Top1Line1') }}</h2>
                                            <h3 class="section-sub-title">{{ __('index.Top1Line2') }}</h3>
                                            <h6>{{ __('index.Top1Line3') }}</h6>
                                            <h6 class="orange">{{ __('index.Top1Line4') }}</h6>
                                        </div>

                                        <div class="col-lg-4 cold-md-12 bgbox p5 br5">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <div class="jc-center ai-center d-flex">
                                                        <i class="fas fa-headphones purple f1-9em"></i>
                                                        <h6 class="section-sub-title white ml-2 mr-2">{{ __('index.Charly0') }}</h6>
                                                        <img src="{{ asset('frontend/assets/images/charly_80.png') }}" style="height:65px;"
                                                            alt="charly" class="img-fluid ml-2">
                                                    </div>
                                                </div>

                                            </div>

                                            <h6 class="white">{!! __('index.Charly1') !!}</h6>
                                            <p class="white">{!! __('index.Charly2') !!}</p>
                                            <a href="{{ route('tostore') }}" class="btn btn-primary d-inline-block mr-2">
                                                <p class="mb-0 white">{{ __('index.Charly3') }}</p>
                                            </a>
                                            <a href="{{ route('charly_posts', ['pays_id' => 'IS']) }}" class="btn btn-primary d-inline-block">
                                                <p class="mb-0 white">{{ __('index.Charly5') }}</p>
                                            </a>


                                        </div>
                                        <div class="col-lg-2 col-md-12" style="position: relative;">
                                            <img src="{{ asset('frontend/assets/images/blog/charly1.jpg') }}" alt="charly" class="img-fluid br5">
                                            <div
                                                style="position: absolute; bottom: 10px; left: 0; right: 0; display: flex; justify-content: center;">
                                                <span
                                                    style="color: white; font-size: 0.8rem; text-align: center; width: 80%;font-style: italic;">{{ __('index.Charly4') }}</span>
                                            </div>
                                        </div>

                                    </div>

                                   -->
        <section id="ts-features" class="ts-features">
            <div class="container">
                <div class="row">
                    <div class="d-flex align-items-center mb-3">
                        <a href="{{ url('spot') }}/{{ $latestSpotWithImg360->pays_id }}/{{ $latestSpotWithImg360->slug }}"
                            class="btn btn-primary me-3">{{ __('index.Voirlespot') }}</a>
                        <h4 class="mb-0 flex-grow-1">{{ __('index.dernier360') }} :
                            {{ $latestSpotWithImg360->pays->getTranslatedLibelle() }} -
                            {{ $latestSpotWithImg360->name }}</h4>
                    </div>
                    <div id="panorama-container" class="panorama-container mt-3"></div>
                    <script src="{{ asset('frontend/assets/js/pannellum.js') }}"></script>
                    <script>
                        pannellum.viewer('panorama-container', {
                            "type": "equirectangular",
                            "panorama": "{{ $latestSpotWithImg360->img360 }}",
                            "autoLoad": true,
                            "preload": true,
                            "autoRotate": -2,
                            "pitch": -30,
                            "hfov": 120
                        });
                    </script>
                </div>
            </div>



            <div class=" swiper">
                <div class="swiper-wrapper">
                    @foreach ($latest360s as $spot)
                        <div class="swiper-slide">
                            <a href="{{ url('spot') }}/{{ $spot->pays_id }}/{{ $spot->slug }}"> <img class="imgbox"
                                    onClick="" src="{{ $spot->imgsquaremedium }}"></a>
                            <div class="bottom-center">
                                <span class="textbox"><b>{{ $spot->name }}</b></span>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </section>

        <div class="row pt5">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="latest-post">

                    <div class="post-body">
                        <h4 class="post-title">
                            {{ __('index.Sub1Line1') }}
                        </h4>
                        <div class="latest-post-meta">
                            <span class="post-item-date">
                                <i class="fa-solid fa-camera orange"></i> {{ __('index.Sub1Line2') }}
                            </span>
                        </div>
                    </div>
                </div><!-- Latest post end -->
            </div><!-- 1st post col end -->

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="latest-post">

                    <div class="post-body">
                        <h4 class="post-title">
                            {{ __('index.Sub2Line1') }}
                        </h4>
                        <div class="latest-post-meta">
                            <span class="post-item-date">
                                <i class="fa-solid fa-sun orange"></i> {{ __('index.Sub2Line2') }}
                            </span>
                        </div>
                    </div>
                </div><!-- Latest post end -->
            </div><!-- 2nd post col end -->

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="latest-post">

                    <div class="post-body">
                        <h4 class="post-title">
                            {{ __('index.Sub3Line1') }}
                        </h4>
                        <div class="latest-post-meta">
                            <span class="post-item-date">
                                <i class="fa-solid fa-map-location-dot orange"></i> {{ __('index.Sub3Line2') }}
                            </span>
                        </div>
                    </div>
                </div><!-- Latest post end -->
            </div><!-- 3rd post col end -->
        </div>
        <!--/ Content row end -->



    </div> -->
    </section>


    <section id="ts-features" class="ts-features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ts-intro">
                        <div class="title-and-button">
                            <h3 class="into-sub-title">{{ __('index.LastSpots') }}</h3>
                            <a class="btn btn-primary indexbtn"
                                href="{{ url('thewall') }}/{{ $idpays }}"">{{ __('destination.VoirAllSpots') }}</a>
                        </div>
                        <p>{{ __('index.LastSpotsDesc') }}</p>
                    </div>
                </div>

            </div>

            <div class=" swiper">
                <div class="swiper-wrapper">
                    @foreach ($lastspots as $spot)
                        <div class="swiper-slide">
                            <a href="{{ url('spot') }}/{{ $spot->pays_id }}/{{ $spot->slug }}"> <img class="imgbox"
                                    onClick="" src="{{ $spot->imgsquaremedium }}"></a>
                            <div class="bottom-center">
                                <span class="textbox"><b>{{ $spot->name }}</b></span>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
    </section>

    <section id="ts-features" class="ts-features">
        <div class="container">
            <div class="row">
                <!--/ Choix des destinations -->
                <div class="col-lg-3">
                    <form method="post" action="{{ route('godestination') }}">
                        @csrf
                        <div class="form-group">
                            <select class="form-control ml15" id="idpays" name="idpays"
                                onChange="this.form.submit()">
                                <option value="">{{ __('destination.SelectDest') }}</option>

                                @foreach ($payslist as $pay)
                                    <option value="{{ $pay->pays_id }}">{{ $pay->getTranslatedLibelle() }}
                                        ({{ $pay->nbpic }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>

                </div>
                <div class="col-lg-3">

                </div>
            </div>
            <!--/ carte avec les destinations -->
            <div class="row">
                <div class="col-lg-8 col-md-12 ">
                    <div class="leaflet-map">
                        <div id="mapindex">
                            <a href="https://www.maptiler.com"
                                style="position:absolute;left:10px;bottom:10px;z-index:999;"><img style="width: 130px;"
                                    src="https://api.maptiler.com/resources/logo.svg" alt="MapTiler logo"></a>
                        </div>
                        <p></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-4 pt-3 br5  bgbox white">
                    <h4 class="white">{{ __('index.ActuBref') }}</h4>
                    @foreach ($timelines as $timeline)
                        <h6> <span class="orange">{{ \Carbon\Carbon::parse($timeline->date)->diffForHumans() }}</span> -
                            @if ($timeline->page)
                                <a href="{{ $timeline->page }}">
                            @endif
                            <span class="white">
                                {{ $timeline->texte }}
                                @if ($timeline->page)
                                    <i class="fas fa-hand-pointer"></i>
                                @endif
                            </span>
                            @if ($timeline->page)
                                </a>
                            @endif
                            <p class="darkgray" style="font-size: 0.95rem;">{{ $timeline->description }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="ts-features" class="ts-features">
        <div class="container my-4 d-flex justify-content-between">
            <div class="card testimonial-card" style="width: 48%;">
                <div class="card-body">
                    <div class="d-flex gap-4">
                        <img src="{{ asset('frontend/assets/images/pierre250.png') }}" alt="" class="img-fluid"
                            style="width: 100px; height: auto;">
                        <div class="d-flex flex-column justify-content-center">
                            <p class="name">{{ __('index.pierreguide') }}</p>
                            <p class="title">{{ __('index.randonnez') }}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p>{{ __('index.pierrerando') }}</p>
                        <div class="text-center">
                            <a class="btn btn-primary indexbtn"
                                href="{{ url('videohike') }}">{{ __('index.seevideohike') }}</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <section class="counter-theme-two section-padding pb-0">
        <div class="container">
            <div class="row text-center">
                <div class="col-xl-8 col-12 offset-xl-2 offset-md-1 col-md-10">
                    <div class="section-title-two">
                        <h2>Ajoutez nos Spots à vos favoris</h2>
                        <span>Construisez votre voyage et partagez avec vos amis</span>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-xl-4 col-md-4 col-sm-4 col-12">
                    <div class="index-counter">
                        <h1><span>{{ $nbIS }}</span></h1>
                        <a href="{{ url('thingstodo/IS') }}">
                            <p>Spots à découvrir en Islande</p>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-sm-4 col-12">
                    <div class="index-counter">
                        <h1><span>{{ $nbKM }}</span></h1>
                        <a href="{{ url('thingstodo/KM') }}">
                            <p>Spots à découvrir aux Comores</p>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-sm-4 col-12">
                    <div class="index-counter">
                        <h1><span>9</span></h1>
                        <p>Spots à découvrir à la Réunion</p>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <style>
        .panorama-container {
            width: 100%;
            height: 500px;
            margin-bottom: 40px;
        }

        .testimonial-card {
            background-color: #ffffff;
            /* bg-white */
            padding: 1.5rem;
            /* p-6 */
            border-radius: 0.5rem;
            /* rounded-lg */
            color: #1f2937;
            /* text-gray-800 */
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
            max-width: 38rem;
            /* max-w-lg */
            margin-left: auto;
            margin-right: auto;
            margin-top: 2.5rem;
            /* my-10 */
            margin-bottom: 2.5rem;
        }

        .testimonial-card img {
            width: 8rem;
            /* w-24 */
            height: 8rem;
            /* h-24 */
            border-radius: 9999px;
            /* rounded-full */
            border: 0.5rem solid #facc15;
            /* border-4 border-yellow-300 */
        }

        .testimonial-card .name {
            font-weight: 600;
            /* font-semibold */
            font-size: 1.125rem;
            /* text-lg */
        }

        .testimonial-card .title {
            color: #d97706;
            /* text-yellow-500 */
        }

        .testimonial-card p {
            color: #4b5563;
            /* text-gray-600 */
        }


        .testimonial-card .img-fluid {
            max-width: 100px;
            height: auto;
        }

        .testimonial-card .name {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .testimonial-card .title {
            font-size: 1rem;
            color: gray;
        }



        .position-relative {
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 20px;
            border-radius: 5px;
        }

        .overlay-link {
            color: white;
            text-decoration: none;
            font-size: 1.5rem;
        }

        .overlay-link i {
            margin-right: 10px;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }
    </style>
    <section id=" ts-features" class="ts-features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ts-intro">
                        <h3 class="into-sub-title">{{ __('index.LastImages') }}</h3>
                        <p>{{ __('index.LastImagesDesc') }}</p>
                    </div>
                </div>

            </div>

            <div class="gridOverflow go-masonry">

                @foreach ($pictures as $picture)
                    <a href=" {{ url('spot') }}/{{ $picture->spot->pays_id }}/{{ $picture->spot->slug }}"
                        class="go_gridItem">


                        <img src="{{ $picture->medium }}" />
                        <span class="go_caption go_caption-full">
                            {{ $picture->spot->name }}

                            <img src="{{ $picture->user->avatar }}" class="avatar-r45"
                                alt="{{ $picture->user->pseudo }}" />


                        </span>


                    </a>
                @endforeach
                <div class="go_gridItem go_gridItem-centered" href="someURL">
                    <p> </p>
                </div>

            </div>
            {{ $pictures->links() }}

    </section>
    <header class="tourism-header">
        <h1>{{ __('index.calltoaction1') }}</h1>
        <p>{{ __('index.calltoaction2') }}</p>
        <a href="{{ route('addotspot') }}" class="btn-call-to-action">{{ __('index.calltoaction3') }}</a>
    </header>


    <style>
        .tourism-header {
            background-color: #f2f2f2;
            /* ou toute autre couleur */
            text-align: center;
            padding: 20px;
        }

        .tourism-header h1 {
            color: #333;
            /* ou toute autre couleur */
            margin-bottom: 10px;
        }

        .tourism-header p {
            color: #666;
            /* ou toute autre couleur */
        }

        .btn-call-to-action {
            background-color: #008cba;
            /* ou toute autre couleur */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-call-to-action:hover {
            background-color: #005f73;
            /* ou toute autre couleur */
        }
    </style>
@endsection

@section('fullscripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.3/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl/1.13.1/mapbox-gl.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl-leaflet/0.0.15/leaflet-mapbox-gl.min.js"></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js"></script>
    <script src="{{ asset('frontend/assets/js/leaflet.extra-markers.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
@endsection

@section('scripts')
    @include ('frontend.mapindexjs');
    $(document).ready(function() {
    $('.avatar-link').click(function() {
    window.location.href = $(this).data('href');
    });
    });
@endsection
