@extends('frontend.main_master')

@section('content')
<div class="container">
    <h1>Dossiers Publics</h1>
    <div class="btn-group mb-3">
    <a href="{{ route('mes-medias')}}" class="mr-4 btn btn-primary">Mes Médias</a>
    <a href="" class="mr-4 btn btn-secondary">Médias Privés</a>
    <a href="{{ route('public-folders')}}" class="btn btn-primary">Médias Publics</a>
    </div>
    {{-- Sélecteur de pays --}}
    <form action="{{ route('public-folders') }}" method="GET">
        <select name="country_id" onchange="this.form.submit()">
            <option value="">Sélectionnez un pays</option>
            @foreach($activeCountries as $country)
               <option value="{{ $country->pays_id }}" {{ ($selectedCountryId == $country->pays_id) ? 'selected' : '' }}>{{ $country->pays }}</option>
            @endforeach
        </select>
    </form>

    {{-- Affichage des dossiers --}}
    @if($publicFolders->isNotEmpty())
        <div class="row">
        @foreach($publicFolders as $folder)
            <div class="card" style="width: 18rem; float: left; margin: 10px;">
                <img src="{{ $folder->shareMedias->first()->thumbnail_link ?? 'placeholder-image-url' }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $folder->name }}</h5>
                    <p class="card-text">Nombre de médias : {{ $folder->shareMedias->count() }}</p>
                    <a href="" class="btn btn-primary">Voir le dossier</a>
                </div>
            </div>
   
        @endforeach
        </div>
    @else
        <p>Aucun dossier public disponible pour ce pays.</p>
    @endif
</div>
@endsection
