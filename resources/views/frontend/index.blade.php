@extends('frontend.main_master')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.3/leaflet.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl/1.13.1/mapbox-gl.min.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.Default.css" />
<link rel="stylesheet" href="{{ asset('frontend/assets/css/Control.FullScreen.css')}}" />
<link rel="stylesheet" href="{{ asset('frontend/assets/css/leaflet.extra-markers.min.css')}}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/GridOverflow3D.css')}}" />

@endsection

@section('content')

  
<section id="news" class="news">
    <div class="container">
      <div class="row text-center">
          <div class="col-lg-7 col-md-12">
            <h2 class="section-sub-title">{{__('index.Top1Line1')}}</h2>
            <h3 class="section-sub-title">{{__('index.Top1Line2')}}</h3>
            <h6 >{{__('index.Top1Line3')}}</h6>
            <h6 class="darkgray" >{{__('index.Top1Line4')}}</h6>
          </div>

          <div class="col-lg-5 cold-md-12 bgbox p5">
          <h5 class="section-sub-title white" style="max-height: 300px">{{__('index.TitreVideo')}}</h5>
          {!!__('index.CodeVideo')!!}
          <a class="linkorange white"><p class="pt5">{{__('index.LienVideo')}}</p></a>
          </div>
      </div>
      <!--/ Title row end -->
  
      <div class="row pt5">
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="latest-post">
                
                <div class="post-body">
                  <h4 class="post-title">
                       {{__('index.Sub1Line1')}}
                  </h4>
                  <div class="latest-post-meta">
                      <span class="post-item-date">
                        <i class="fa-solid fa-camera orange"></i> {{__('index.Sub1Line2')}}
                      </span>
                  </div>
                </div>
            </div><!-- Latest post end -->
          </div><!-- 1st post col end -->
  
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="latest-post">
               
                <div class="post-body">
                  <h4 class="post-title">
                     {{__('index.Sub2Line1')}}
                  </h4>
                  <div class="latest-post-meta">
                      <span class="post-item-date">
                        <i class="fa-solid fa-sun orange"></i> {{__('index.Sub2Line2')}}
                      </span>
                  </div>
                </div>
            </div><!-- Latest post end -->
          </div><!-- 2nd post col end -->
  
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="latest-post">
                
                <div class="post-body">
                  <h4 class="post-title">
                      {{__('index.Sub3Line1')}}
                  </h4>
                  <div class="latest-post-meta">
                      <span class="post-item-date">
                        <i class="fa-solid fa-map-location-dot orange"></i> {{__('index.Sub3Line2')}}
                      </span>
                  </div>
                </div>
            </div><!-- Latest post end -->
          </div><!-- 3rd post col end -->
      </div>
      <!--/ Content row end -->
  
     
  
    </div>
</section> 
<section id="ts-features" class="ts-features">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="ts-intro">
             <div class="title-and-button">
                <h3 class="into-sub-title">{{ __('index.LastSpots') }}</h3>
                 <a class="btn btn-primary indexbtn" href="{{ url('thewall') }}/{{ $idpays}}"">{{ __('destination.VoirAllSpots') }}</a>
             </div>
             <p>{{ __('index.LastSpotsDesc') }}</p> 
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
          <!--/ Choix des destinations --> 
          <div class="col-lg-3">
            <form method="post" action="{{ route ('godestination') }}">
                @csrf
                <div class="form-group">
                    <select class="form-control ml15" id="idpays" name="idpays" onChange="this.form.submit()">
                        <option value="">{{__('destination.SelectDest')}}</option>
                    
                        @foreach($payslist as $pay)
                        <option value="{{$pay->pays_id}}" >{{$pay->pays}} ({{$pay->nbpic}})</option>
                        @endforeach
                    </select>
                </div>
              </form>
              
            </div>
            <div class="col-lg-3">
              <a class="btn btn-primary indexbtn" href="{{ url('thewall') }}/{{ $idpays}}"">{{ __('destination.VoirAllSpots') }}</a>
            </div>
       </div>
       <!--/ carte avec les destinations -->
      <div class="row">
        <div class="col-lg-8 col-md-12 ">
            <div class="leaflet-map">
                <div id="mapindex">
                    <a href="https://www.maptiler.com" style="position:absolute;left:10px;bottom:10px;z-index:999;"><img style="width: 130px;" src="https://api.maptiler.com/resources/logo.svg" alt="MapTiler logo"></a>
                </div>
                <p></p>
            </div>
        </div>  
        <div class="col-lg-4 col-md-12 mb-5 bgbox">
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
            <h3 class="into-sub-title">{{ __('index.LastImages') }}</h3>
             <p>{{ __('index.LastImagesDesc') }}</p> 
          </div>
        </div> 

      </div>

      <div class="gridOverflow go-masonry">

    @foreach ($pictures as $picture)
    <a href="/destination/{{$picture->spot->pays_id}}/{{$picture->spot->id}}"class="go_gridItem">

         <img src="{{ $picture->medium}}" /> 
         <span class="go_caption go_caption-full">
                {{ $picture->spot->name}}
             
                   <img src="{{ $picture->user->avatar }}" class="avatar-r45" alt="{{ $picture->user->pseudo }}" />
              
               
         </span>
         
            
    </a>
    @endforeach
  <div class="go_gridItem go_gridItem-centered" href="someURL"><p> centered content - typically some text </p> </div>
 
</div>
<div class="row">{{ $pictures->links() }}

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.3/leaflet.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl/1.13.1/mapbox-gl.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl-leaflet/0.0.15/leaflet-mapbox-gl.min.js"></script>
  <script src="https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js"></script>
  <script src="{{asset('frontend/assets/js/leaflet.extra-markers.min.js')}}"></script>
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