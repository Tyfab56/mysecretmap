@extends('frontend.main_master')



@section('content')
<div class="container">
    <h1>Modifier le dossier</h1>
    <form action="{{ route('admin.folders.update', $folder->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom du dossier</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $folder->name }}" required>
        </div>

        <!-- Champ de sélection pour le pays avec l'option actuelle sélectionnée -->
        <div class="form-group">
            <label for="country_id">Pays</label>
            <select class="form-control" id="country_id" name="country_id">
                @foreach($activeCountries as $country)
                    <option value="{{ $country->pays_id }}" {{ $folder->country_id == $country->pays_id ? 'selected' : '' }}>{{ $country->pays }}</option>
                @endforeach
            </select>
        </div>

        <!-- Boutons radio pour le statut avec l'option actuelle sélectionnée -->
        <div class="form-group">
            <label>Statut</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="statusPublic" value="public" {{ $folder->status == 'public' ? 'checked' : '' }}>
                    <label class="form-check-label" for="statusPublic">Public</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="statusPrivate" value="private" {{ $folder->status == 'private' ? 'checked' : '' }}>
                    <label class="form-check-label" for="statusPrivate">Privé</label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('admin.folders.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection

