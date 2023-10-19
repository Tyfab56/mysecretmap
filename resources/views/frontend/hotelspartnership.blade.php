@extends('frontend.main_master')
@section('content')

<div class="container mt-5">
            <h1 class="text-center mb-4">{{ __('audioguide.HotelTitre') }}</h1>

            <!-- Image en dessous -->
            <div class="text-center">
                <img src="{{ asset('frontend/assets/images/charly_80.png') }}" alt="Description de l'image" class="img-fluid mb-4">
            </div>
            <h2 class="text-center mb-4">{{ __('audioguide.HotelSousTitre') }}</h2>
</div>            
@endsection