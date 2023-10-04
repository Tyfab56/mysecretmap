@extends('frontend.main_master')
@section('content')
<div class="container mt-5">
    <!-- Titre en haut -->
    <h1 class="text-center mb-4">{{ __('audioguide.TrspTitre') }}</h1>

    <!-- Image en dessous -->
    <div class="text-center">
        <img src="{{ asset('frontend/assets/images/charly_80.png') }}" alt="Description de l'image" class="img-fluid mb-4">
    </div>

    <!-- Sous-titre en dessous de l'image -->
    <h2 class="text-center mb-4">{{ __('audioguide.TrspSousTitre') }}</h2>

    <!-- Quatre cards avec des icônes et un texte en dessous -->
    <div class="row centered-row">

        <div class="col-md-3 mb-4">
            <div class="card text-center">
                <img src="{{ asset('frontend/assets/images/icon-image/avion.png') }}" alt="Description de l'icône 1" class="card-img-top mt-3">
                <div class="card-body">
                    <p class="card-text">{{ __('audioguide.Trspbox1') }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <a href="{{ URL::route('croisiere')}}" >
            <div class="card text-center">
                <img src="{{ asset('frontend/assets/images/icon-image/bateau.png') }}" alt="Description de l'icône 2" class="card-img-top mt-3">
                <div class="card-body">
                    <p class="card-text">{{ __('audioguide.Trspbox2') }}</p>
                </div>
            </div>
</a>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card text-center">
                <img src="{{ asset('frontend/assets/images/icon-image/voiture.png') }}" alt="Description de l'icône 3" class="card-img-top mt-3">
                <div class="card-body">
                    <p class="card-text">{{ __('audioguide.Trspbox3') }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card text-center">
                <img src="{{ asset('frontend/assets/images/icon-image/bus.png') }}" alt="Description de l'icône 4" class="card-img-top mt-3">
                <div class="card-body">
                    <p class="card-text">{{ __('audioguide.Trspbox4') }}</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Descriptif qui invite à cliquer -->
    <p class="text-center mt-4">{{ __('audioguide.TrspEnd') }}</p>
<style>
    .centered-row {
    max-width: 70%;
    margin: auto;
}
</style>    
@endsection