@extends('frontend.main_master')

@section('content')
<div class="container mt-4">
<h1>Dossiers Privés</h1>
   @include('partials.navmedias')
   <div class="row">
   <div class="card-container" style="display: flex; flex-wrap: wrap;">
    @forelse($privateFolders as $folder)
    <div class="card" style="width: 18rem; margin: 10px;">
        <img src="{{ $folder->shareMedias->first()->thumbnail_link ?? 'placeholder-image-url' }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $folder->name }}</h5>
            <p class="card-text">Nombre de médias : {{ $folder->shareMedias->count() }}</p>
            <a href="{{ route('show-folder', $folder->id) }}" class="btn btn-primary">Voir le dossier</a>
        </div>
    </div>

      @empty
        <div class="row">
            <div class="alert alert-info">Si vous venez de vous inscrire, patientez un peu, le temps que nous activions vos médias privés (24h). Vous recevez un message dès que c'est fait.</div>
        </div>    
        @endforelse
</div>
</div>
</div>
@endsection