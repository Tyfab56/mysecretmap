@extends('frontend.main_master')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl/1.13.1/mapbox-gl.min.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.Default.css" />
<link rel="stylesheet" href="{{ asset('frontend/assets/css/Control.FullScreen.css')}}" />
<link rel="stylesheet" href="{{ asset('frontend/assets/css/leaflet.extra-markers.min.css')}}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
@endsection

@section('content')

  
<section id="news" class="news">
    <div class="container">
      <div class="row text-center">
          <div class="col-7">
            <h2 class="section-title">Photographes, vous allez aimer</h2>
            <h3 class="section-sub-title">Vos prochains voyages</h3>
          </div>
          <div class="col-5">
            <h2 class="section-title">Découvrez nos Circuits</h2>
            <h3 class="section-sub-title"> Ou Créez le votre ....</h3> 
             
          </div>
      </div>
      <!--/ Title row end -->
  
      <div class="row">
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="latest-post">
                
                <div class="post-body">
                  <h4 class="post-title">
                      <a href="news-single.html" class="d-inline-block">Des cartes interactives pour preparer vos voyages photos</a>
                  </h4>
                  <div class="latest-post-meta">
                      <span class="post-item-date">
                        <i class="fa-solid fa-camera orange"></i> Les plus beaux spots
                      </span>
                  </div>
                </div>
            </div><!-- Latest post end -->
          </div><!-- 1st post col end -->
  
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="latest-post">
               
                <div class="post-body">
                  <h4 class="post-title">
                      <a href="news-single.html" class="d-inline-block">Un simulateur de lumière pour choisir le bon lieu au bon moment</a>
                  </h4>
                  <div class="latest-post-meta">
                      <span class="post-item-date">
                        <i class="fa-solid fa-sun orange"></i> LE BON ECLAIRAGE
                      </span>
                  </div>
                </div>
            </div><!-- Latest post end -->
          </div><!-- 2nd post col end -->
  
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="latest-post">
                
                <div class="post-body">
                  <h4 class="post-title">
                      <a href="news-single.html" class="d-inline-block">Un générateur de circuit pour optimiser vos déplacements</a>
                  </h4>
                  <div class="latest-post-meta">
                      <span class="post-item-date">
                        <i class="fa-solid fa-map-location-dot orange"></i> UNE BONNE ORGANISATION
                      </span>
                  </div>
                </div>
            </div><!-- Latest post end -->
          </div><!-- 3rd post col end -->
      </div>
      <!--/ Content row end -->
  
     
  
    </div>
  
  
 
  <section id="ts-features" class="ts-features">
    <div class="container">
        <div class="row">
           
            <form method="post" action="{{ route ('godestination') }}">
                @csrf
                <div class="form-group">
                    <select class="form-control ml15" id="idpays" name="idpays" onChange="this.form.submit()">
                    <option value="">{{__('destination.selectdest')}}</option>
                 
                    @foreach($payslist as $pay)
                    <option value="{{$pay->pays_id}}" {{($idpays == $pay->pays_id) ? 'selected' : ''}}>{{$pay->pays}} ({{$pay->nbpic}})</option>
                    @endforeach
                    </select>
                </div>
              </form>
              <a class="btn btn-primary indexbtn" href="{{ url('thewall') }}/{{ $idpays}}"">{{ __('destination.VoirAllSpots') }}</a>
        </div>
        
      <div class="row">
        <div class="col-lg-9 ">
            <div class="leaflet-map">
                <div id="map">
                    <a href="https://www.maptiler.com" style="position:absolute;left:10px;bottom:10px;z-index:999;"><img style="width: 130px;" src="https://api.maptiler.com/resources/logo.svg" alt="MapTiler logo"></a>
                </div>
                <p></p>
            </div>
        </div>  
        <div class="col-lg-3 mb-5 bg-grey">
             <livewire:show-head-spot />
            
        </div>
      </div>
    </div>   
  </section>
  <section id="ts-features" class="ts-features">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="ts-intro">
            <h3 class="into-sub-title">{{ __('index.LastSpots') }}</h3>
              
          </div>
        </div> 

      </div>

      <div class="swiper">
        <div class="swiper-wrapper">
        @foreach($lastspots as $spot)
        <div class="swiper-slide">
          <a href="{{ url('destination') }}/{{$spot->pays_id }}/{{ $spot->id }}"> <img class="imgbox" onClick="" src="{{ $spot->imgsquaremedium }}"></a>
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
          <div class="col-lg-6">
            <div class="ts-intro">
         
                <h3 class="into-sub-title">{{ __('index.BonusClub') }}</h3>
                <p>{{ __('index.BonusClubDesc') }}.</p>
            </div><!-- Intro box end -->
  
            <div class="gap-20"></div>
  
            <div class="row">
                <div class="col-md-6">
                  <div class="ts-service-box">
                      <span class="ts-service-icon">
                        <i class="fas fa-trophy"></i>
                      </span>
                      <div class="ts-service-box-content">
                        <h3 class="service-box-title">{{ __('index.BonusInedit') }}</h3>
                      </div>
                  </div><!-- Service 1 end -->
                </div><!-- col end -->
  
                <div class="col-md-6">
                  <div class="ts-service-box">
                      <span class="ts-service-icon">
                        <i class="fas fa-sliders-h"></i>
                      </span>
                      <div class="ts-service-box-content">
                        <h3 class="service-box-title">{{ __('index.BonusMakingof') }}</h3>
                      </div>
                  </div><!-- Service 2 end -->
                </div><!-- col end -->
            </div><!-- Content row 1 end -->
  
            <div class="row">
                <div class="col-md-6">
                  <div class="ts-service-box">
                      <span class="ts-service-icon">
                        <i class="fas fa-thumbs-up"></i>
                      </span>
                      <div class="ts-service-box-content">
                        <h3 class="service-box-title">{{ __('index.BonusFunction') }}</h3>
                      </div>
                  </div><!-- Service 1 end -->
                </div><!-- col end -->
  
                <div class="col-md-6">
                  <div class="ts-service-box">
                      <span class="ts-service-icon">
                        <i class="fas fa-users"></i>
                      </span>
                      <div class="ts-service-box-content">
                        <h3 class="service-box-title">{{ __('index.BonusTeam') }}</h3>
                      </div>
                  </div><!-- Service 2 end -->
                </div><!-- col end -->
            </div><!-- Content row 1 end -->
            <div class="row">
              <div class="col-md-6">
                <p>{!! trans('index.BonusSubText', array('url' => "/patreon")) !!}
                  
              </div>
            </div>
          </div><!-- Col end -->
  
          <div class="col-lg-6 mt-4 mt-lg-0">
            <h3 class="into-sub-title">{{ __('index.NousSoutenir') }}</h3>
            <p>{{ __('index.NousSoutenirDesc') }}</p>
  
            <div class="accordion accordion-group" id="our-values-accordion">
                <div class="card">
                  <div class="card-header p-0 bg-transparent" id="headingOne">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          {{ __('index.Patron') }}
                        </button>
                      </h2>
                  </div>
                
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#our-values-accordion">
                      <div class="card-body">
                        {{ __('index.PatronDesc') }}
                      </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header p-0 bg-transparent" id="headingTwo">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          {{ __('index.ShareSpots') }}
                        </button>
                      </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#our-values-accordion">
                      <div class="card-body">
                        {{ __('index.ShareSpotsDesc') }}
                      </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header p-0 bg-transparent" id="headingThree">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          {{ __('index.JoinTeam') }}
                        </div>
                        </button>
                      </h2>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#our-values-accordion">
                      <div class="card-body">
                        {{ __('index.JoinTeamDesc') }}
                      </div>
                  </div>
                </div>
            </div>
            <!--/ Accordion end -->
  
          </div><!-- Col end -->
      </div><!-- Row end -->
    </div><!-- Container end -->
  </section><!-- Feature are end -->    
@endsection

@section('fullscripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl/1.13.1/mapbox-gl.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl-leaflet/0.0.15/leaflet-mapbox-gl.min.js"></script>

  <script src="{{asset('frontend/assets/js/Control.FullScreen.js')}}"></script>
  <script src="{{asset('frontend/assets/js/leaflet-semicircle.js')}}"></script>
  <script src="https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js"></script>
  <script src="{{asset('frontend/assets/js/leaflet.extra-markers.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/suncalc/1.9.0/suncalc.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
@endsection

@section('scripts')

@include ('frontend.mapjs');
@include ('frontend.mapindexjs');

@endsection