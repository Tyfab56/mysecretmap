@extends('frontend.main_master')
@section('content') 
@foreach ($spots as $spot)
    <div>
        <p>{{ $spot->name }}</p> <!-- ou tout autre champ du modèle Spot que vous souhaitez afficher -->
        <!-- Pour accéder à la traduction : -->
        <p>Description: {{ $spot->translate(app()->getLocale())->description }}</p>
    </div>
@endforeach
@endsection