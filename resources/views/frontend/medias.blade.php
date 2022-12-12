@extends('frontend.main_master')
@section('content')
@auth
@if (auth()->user()->isPhotographer())

@else
  Uniquement pour les photographes
@endif

@endauth
@guest
Cette section n'est pas accéssible désolé
@endguest
@endsection