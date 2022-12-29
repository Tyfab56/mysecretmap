@extends('frontend.main_master')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl/1.13.1/mapbox-gl.min.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.Default.css" />
<link rel="stylesheet" href="{{ asset('frontend/assets/css/Control.FullScreen.css')}}" />
<link rel="stylesheet" href="{{ asset('frontend/assets/css/leaflet.extra-markers.min.css')}}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                    <div class="col-lg-3"> <a class="btn btn-primary" href="{{ url('thewall') }}/{{ $idpays}}">THE WALL</a></div>
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
          <div class="col-lg-12">
            <div><b>Spots à proximité :</b></div>
            <div id="medias"></div></div>
        </div>
        <div class="row bgregbox">  
          <div class="col-lg-6 center"><livewire:show-map-globale /></div>
          <div class="col-lg-6 center"><livewire:show-img-region /></div>
        </div>
        <div class="row min100">  
          <div class="col-lg-6 col-md-12">Chemin Accès</div>
          <div class="col-lg-6 col-md-12">Montagne Environnentes</div>
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
          <div class="col-lg-3 col-md-12  bgbox selection:">
            @auth
           
                  <div class="form-group">
                    <select class="form-control ml15 mw350 mauto" id="idcircuit" name="idcircuit">
                    <option value="">{{__('destination.SelectCircuit')}}</option>
                  
                        @foreach($circuits as $circuit)                    
                          <option value="{{$circuit->id}}">{{$circuit->titre}}</option>
                        @endforeach
                   </select>
                  </div>
            @endauth
            @guest

              <p ><h3 class="white">{{__('destination.CircuitLogin')}}</h3></p>
              <a class="btn btn-primary mb5" href="{{ route('login') }}">{{__('menu.Connexion')}}</a>
            @endguest
          </div>
          <div class="col-lg-9">
          
          </div>
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
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" sync></script>
@endsection

@section('scripts')

@include ('frontend.mapjs');
@include ('frontend.mapdestinationjs');

@endsection