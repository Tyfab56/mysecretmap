@extends('frontend.main_master')

@section('content')
<div class="container">
    <h1>Associer des Bannières aux Spots</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="userFilter">Filtrer par Utilisateur :</label>
                <select name="userFilter" id="userFilter" class="form-control select2" style="width: 100%;" required>
                    <option value="">Sélectionner un utilisateur</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3>Spots Associés</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Spot</th>
                        <th>Bannière</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="associatedSpotsBody">
                    <!-- Les spots associés seront affichés ici -->
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h3>Associer un Spot à une Bannière</h3>
            <div class="form-group">
                <label for="userBanners">Sélectionner une Bannière :</label>
                <select name="userBanners" id="userBanners" class="form-control select2" style="width: 100%;" required>
                    <option value="">Sélectionner une bannière</option>
                    @foreach($banners as $banner)
                    <option value="{{ $banner->id }}">{{ $banner->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="filteredSpots">Sélectionner un Spot :</label>
                <select name="filteredSpots" id="filteredSpots" class="form-control select2" style="width: 100%;" required>
                    <!-- Les spots filtrés seront chargés ici via AJAX -->
                </select>
            </div>
            <div class="form-group">
                <button id="associateBtn" class="btn btn-primary">Associer</button>
            </div>
        </div>
    </div>
</div>
@endsection
