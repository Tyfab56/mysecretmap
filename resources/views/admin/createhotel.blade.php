@extends('frontend.main_master')
@section('content')
{{-- resources/views/add_hotel.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Colonne pour le formulaire -->
        <div class="col-md-8">
            <h1>Ajouter un nouvel hôtel</h1>

            <form action="{{ route('admin.hotels.store') }}" method="POST">
                @csrf
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
                    <label for="country_code">Code Pays</label>
                    <input type="text" class="form-control" id="country_code" name="country_code">
                </div>

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

                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>

        <!-- Colonne pour la carte -->
        <div class="col-md-4">
            <div id="map" style="height: 400px;">
                {{-- Ici, vous pouvez intégrer votre carte --}}
            </div>
        </div>
    </div>
</div>
@endsection

@endsection