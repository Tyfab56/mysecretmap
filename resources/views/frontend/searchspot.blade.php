@extends('frontend.main_master')
@section('content') 
@foreach ($spots as $spot)
    <div class="d-flex align-items-center mb-3">
        <!-- Image à gauche -->
        <img src="{{ $spot->imgsquaresmall }}" alt="{{ $spot->title }}" class="mr-3" width="100" height="100">

        <!-- Titre et description à droite de l'image -->
        <div class="flex-grow-1">
            <h4>{{ $spot->title }}</h4>
            <p>{{ $spot->translate(app()->getLocale())->description }}</p>
        </div>

        <!-- Bouton encore plus à droite -->
        <div>
            <a href="{{ route('destination', ['country_code' => $spot->country_code, 'spot_id' => $spot->id]) }}" class="btn btn-primary">
                Voir plus
            </a>
        </div>
    </div>
@endforeach

@endsection