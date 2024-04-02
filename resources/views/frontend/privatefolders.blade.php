@extends('frontend.main_master')

@section('content')
<div class="container mt-4">
<h1>Dossiers Privés</h1>
   @include('partials.navmedias')
   <div class="row">
    @foreach($privateFolders as $folder)
    <div class="card" style="width: 18rem; float: left; margin: 10px;">
                <img src="{{ $folder->shareMedias->first()->thumbnail_link ?? 'placeholder-image-url' }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $folder->name }}</h5>
                    <p class="card-text">Nombre de médias : {{ $folder->shareMedias->count() }}</p>
                    <a href="{{ route('show-folder', $folder->id) }}" class="btn btn-primary">Voir le dossier</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>
@endsection