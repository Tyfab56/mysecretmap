@extends('frontend.main_master')


@section('content')
<div class="container">
    <h1>Créer un nouveau dossier</h1>
    <form action="{{ route('admin.folders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nom du dossier</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <!-- Champ de sélection pour le pays -->
        <div class="form-group">
            <label for="country_id">Pays</label>
            <select class="form-control" id="country_id" name="country_id">
                @foreach($activeCountries as $country)
                    <option value="{{ $country->pays_id }}">{{ $country->pays }}</option>
                @endforeach
            </select>
        </div>

        <!-- Boutons radio pour le statut -->
        <div class="form-group">
            <label>Statut</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="statusPublic" value="public">
                    <label class="form-check-label" for="statusPublic">Public</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="statusPrivate" value="private" checked>
                    <label class="form-check-label" for="statusPrivate">Privé</label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('admin.folders.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
