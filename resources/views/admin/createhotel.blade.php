@extends('frontend.main_master')
@section('content')
<div class="container">
    <div class="row">
    <a href="{{ route('admin.hotels') }}" class="btn btn-primary">Retour</a>
     </div>
    <div class="row">
    <form action="{{ route('admin.hotels.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6"> <!-- Première colonne -->
            <div class="form-group">
                <label for="name">Nom de l'hôtel</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="address">Adresse</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>

            <div class="form-group">
                <label for="city">Ville</label>
                <input type="text" class="form-control" id="city" name="city">
            </div>

            <div class="form-group">
                <label for="postal_code">Code Postal</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code">
            </div>

            <div class="form-group">
                <label for="country_code">Pays</label>
                <select class="form-control" id="country_code" name="country_code">
                    {{-- Ici, insérez les options de pays --}}
                </select>
            </div>
        </div>

        <div class="col-md-6"> <!-- Deuxième colonne -->
            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="text" class="form-control" id="latitude" name="latitude">
            </div>

            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="text" class="form-control" id="longitude" name="longitude">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="image_url">URL de l'image</label>
                <input type="text" class="form-control" id="image_url" name="image_url">
            </div>

            <div class="form-group">
                <label for="website_url">URL du site web</label>
                <input type="text" class="form-control" id="website_url" name="website_url">
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>


        <!-- Colonne pour la carte -->
       
    </div>
</div>
@endsection

