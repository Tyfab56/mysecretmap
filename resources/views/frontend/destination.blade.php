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
<section id="ts-features" class="ts-features">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">Bandeau de pub + register</div>
        </div>
        
        <div class="row">  
          
          
               <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-9"><img class="max50" src="{{asset('frontend/assets/images')}}/{{ Config::get('app.locale') }}/clubpatreon.jpg">
                    <br>Pour bénéficier des nombreux Bonus et faire grandir cette carte</div>
                    <div class="col-lg-3">Boutons</div>
                </div>    
                <div class="leaflet-map">
                    <div class="row">
                        <div class="col-sm-6"> 
                              <div style="padding : 5px"><b>{{__('destination.choiceday')}} :</b> <span id="theday"></span></div>
                              <div style="padding: 5px;"> <input type="range" class="form-range" min="1" max="365" oninput="changeRange(this.value)" onchange="changeRange(this.value)" id="dayofyear"></div>
                        </div>
                        <div class="col-sm-6"> 
                              <div style="padding : 5px"><b>{{__('destination.choicehour')}} :</b> <span id="thehour"></span><span id="thedayhour"></span></div>
                              <div style="padding: 5px;"> <input type="range" class="form-range" min="0" max="24" oninput="changeHour(this.value)" onchange="changeHour(this.value)" id="hourofday"></div>
                        </div>   
                  </div>
                    <div id="map">
                        <a href="https://www.maptiler.com" style="position:absolute;left:10px;bottom:10px;z-index:999;"><img src="https://api.maptiler.com/resources/logo.svg" alt="MapTiler logo"></a>
                    </div>
                    <p><span style="color:red"><b>{{__('destination.RedLine')}}</b></span> / <span style="color:orange"><b>{{__('destination.OrangeLine')}}</b></span></p>
                </div>
               </div>
          <div class="col-lg-3 bgbox"> <livewire:show-map-spot /></div>
        </div>
        <div class="row bgregbox">
          <div class="col-lg-12"><div id="medias"></div></div>
        </div>
        <div class="row bgregbox">  
          <div class="col-lg-6 center"><livewire:show-map-globale /></div>
          <div class="col-lg-6 center"><livewire:show-img-region /></div>
        </div>
        <div class="row">  
          <div class="col-lg-6">Chemin Accès</div>
          <div class="col-lg-6">Montagne Environnentes</div>
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
        <div class="row">      
          <div class="col-lg-3">Circuit</div>
          <div class="col-lg-9">Images</div>
        </div>  
        <div class="row">
        <div class="col-lg-12">Vidéos le club</div>
        </div>
        <div class="row">
                  <div class="col-lg-12">Autres vidéos</div>
        </div>
        <div class="row">          
          <div class="col-lg-12">Neuwsletter</div>
        </div>  
  
  
        </div>
    </div>
  </section>
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
  <script src="{{  asset('frontend/assets/js/intense.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

@endsection

@section('scripts')

@include ('frontend.mapjs');
@include ('frontend.mapdestinationjs');

@endsection