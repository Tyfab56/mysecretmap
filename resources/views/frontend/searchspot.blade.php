@extends('frontend.main_master')
@section('content') 
@foreach ($spots as $spot)
    <div>
        <p>{{ $spot->name }}</p> <!-- ou tout autre champ du modèle Spot que vous souhaitez afficher -->
        <!-- Vous pouvez également accéder à la traduction via : -->
        <p>Description: {{ $spot->translations->where('locale', app()->getLocale())->first()->description }}</p>
    </div>
@endforeach
@endsection