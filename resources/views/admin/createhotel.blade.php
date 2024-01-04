@extends('frontend.main_master')
@section('content')
<div class="container">
    <div class="row">
    <a href="{{ route('admin.hotels') }}" class="btn btn-primary">Retour</a>
     </div>
    <div class="row">
    <form action="{{ isset($hotel) ? route('admin.hotels.update', $hotel->id) : route('admin.hotels.store') }}" method="POST" class="w100 form-custom">
    @csrf
    @if(isset($hotel))
        @method('PUT')
    @endif

    <div class="row">
        <!-- Première colonne -->
        <div class="col-lg-6 mb-3">
            <div class="form-group">
                <label for="name" class="form-label">Nom de l'hôtel</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $hotel->name ?? '') }}" required>
            </div>
            <div class="form-group">
                <label for="address" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $hotel->address ?? '') }}">
            </div>
            <div class="form-group">
                <label for="city" class="form-label">Ville</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $hotel->city ?? '') }}">
            </div>
            <div class="form-group">
                <label for="postal_code" class="form-label">Code Postal</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code', $hotel->postal_code ?? '') }}">
            </div>
            <div class="form-group">
                <label for="country_code" class="form-label">Pays</label>
                <select class="form-control" id="country_code" name="country_code">
    @foreach($countries as $country)
        <option value="{{ $country->pays_id }}" {{ (isset($hotel) && $hotel->country_code == $country->pays_id) ? 'selected' : '' }}>
            {{ $country->pays }}
        </option>
    @endforeach
</select>
            </div>
        </div>

        <!-- Deuxième colonne -->
        <div class="col-lg-6 mb-3">
            <div class="form-group">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" class="form-control" id="latitude" name="latitude" value="{{ old('latitude', $hotel->latitude ?? '') }}">
            </div>
            <div class="form-group">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude', $hotel->longitude ?? '') }}">
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $hotel->description ?? '') }}</textarea>
            </div>
            <div class="form-group">
                <label for="image_url" class="form-label">URL de l'image</label>
                <input type="text" class="form-control" id="image_url" name="image_url" value="{{ old('image_url', $hotel->image_url ?? '') }}">
            </div>
            <div class="form-group">
                <label for="website_url" class="form-label">URL du site web</label>
                <input type="text" class="form-control" id="website_url" name="website_url" value="{{ old('website_url', $hotel->website_url ?? '') }}">
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-custom mt-2">{{ isset($hotel) ? 'Mettre à jour' : 'Ajouter' }}</button>
</form>




        <!-- Colonne pour la carte -->
       
    </div>
</div>
<style>
    .form-custom {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-top: 20px;
}

/* Style pour les champs de formulaire */
.form-custom .form-control {
    border-radius: 5px;
    border: 1px solid #ced4da;
}

/* Animation au focus */
.form-custom .form-control:focus {
    border-color: #80bdff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    outline: 0;
}

/* Bouton avec style personnalisé */
.form-custom .btn-custom {
    background-color: #007bff;
    border-color: #007bff;
    color: #fff;
    border-radius: 5px;
    padding: 10px 20px;
}

.form-custom .btn-custom:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}
</style>
@endsection

