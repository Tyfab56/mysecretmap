@extends('frontend.main_master')

@section('content')
<div class="container">
    <h1>Dossiers Publics</h1>

    {{-- Sélecteur de pays --}}
    <form action="{{ route('public-folders') }}" method="GET">
        <select name="country_id" onchange="this.form.submit()">
            <option value="">Sélectionnez un pays</option>
            @foreach($activeCountries as $country)
                <option value="{{ $country->pays_id }}" {{ $selectedCountryId == $country->pays_id) ? 'selected' : '' }}>{{ $country->pays }}</option>
            @endforeach
        </select>
    </form>

    {{-- Affichage des dossiers --}}
    @if($folders->isNotEmpty())
        @foreach($publicFolders as $folder)
            <div class="folder">
                <h3>{{ $folder->name }}</h3>
                <p>Nombre de médias : {{ $folder->shareMedias->count() }}</p>
                {{-- Ajouter un lien vers la vue détaillée du dossier si nécessaire --}}
                <a href="{{ route('showbyfolder', $folder->id) }}">Voir le dossier</a>
            </div>
        @endforeach
    @else
        <p>Aucun dossier public disponible pour ce pays.</p>
    @endif
</div>
@endsection
