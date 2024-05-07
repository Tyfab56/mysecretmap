@extends('frontend.main_master')
@section('content')
<section class="pad_section">

    <div class="container pad_container_16">
        <div class="pt-4 pb-4">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="text-wrapper">
                    <div class="row align-items-center">
                        <div class="col-md-2 center ">
                            <img src="{{ asset('frontend/assets/images/charly_80.png')}}" alt="charly" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h1 class="card-title mbr-fonts-style"><strong>{{ __('audioguide.AudioTitre') }}</strong></h1>
                            <h6 class="card-title mbr-fonts-style"><strong>{{ __('audioguide.AudioSubTitre') }}</strong></h6>
                        </div>
                    </div>
                        <p class="mbr-text mbr-fonts-style mb-4 display-7">
                        {{ __('audioguide.AudioDesc') }}</p>
                        <!-- Première ligne de trois images -->
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4">
        <img src="{{ asset('frontend/assets/images/audioguide_demo1.jpg') }}" alt="Description de l'image 1" class="img-fluid">
        <p class="subpic">{{ __('audioguide.Image1') }}</p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <img src="{{ asset('frontend/assets/images/audioguide_demo2.jpg') }}" alt="Description de l'image 2" class="img-fluid">
        <p class="subpic">{{ __('audioguide.Image2') }}</p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <img src="{{ asset('frontend/assets/images/audioguide_demo3.jpg') }}" alt="Description de l'image 3" class="img-fluid">
        <p class="subpic">{{ __('audioguide.Image3') }}</p>
    </div>
</div>

<!-- Deuxième ligne de trois images -->
<div class="row mt-4"> <!-- mt-4 ajoute une marge en haut pour espacer les deux lignes -->
    <div class="col-lg-4 col-md-4 col-sm-4">
        <img src="{{ asset('frontend/assets/images/audioguide_demo4.jpg') }}" alt="Description de l'image 4" class="img-fluid">
        <p class="subpic">{{ __('audioguide.Image4') }}</p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <img src="{{ asset('frontend/assets/images/audioguide_demo5.jpg') }}" alt="Description de l'image 5" class="img-fluid">
        <p class="subpic">{{ __('audioguide.Image5') }}</p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <img src="{{ asset('frontend/assets/images/audioguide_demo6.jpg') }}" alt="Description de l'image 6" class="img-fluid">
        <p class="subpic">{{ __('audioguide.Image6') }}</p>
    </div>
</div>

                           
                    </div>
                </div>
                <div class="col-lg-4 center"> 
                <div>   
                    <h6>{{ __('audioguide.OurProducts') }}</h6>
                    <p>- Iceland in English</p>
                    <p>- Islande en Français </p>   
                    <p>- Island auf Deutsch (Bald) </p>                   
                </div>

               <!-- Petite image -->
               <div class="center mb-2">
                   <img src="{{asset('frontend/assets/images/tostore.png')}}" alt="Store" width="100">
              </div>

              <!-- Bouton -->
              <div class="center">
              <a href="{{ route('tostore') }}">
                  <button type="button" class="btn btn-primary">{{ __('destination.pubaudio3') }}</button>
              </a>
              </div>           
                                    
                                    
                </div>
            </div>
          
           
        </div>
       
    </div>
</section>



@endsection

