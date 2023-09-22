@extends('frontend.main_master')
@section('content')
<h2>{{ $charlyPost->title }}</h2>
    <p>{{ $charlyPost->description }}</p>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $charlyPost->video_link }}" frameborder="0" allowfullscreen></iframe>
    <!-- Ajouter d'autres détails si nécessaire -->

 @endsection   