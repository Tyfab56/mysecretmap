@extends('frontend.main_master')

@section('content')

<h1>Gestion de l'Association Bannière-Spot</h1>

<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Filtrer les utilisateurs</h5>
                <select id="userFilter" class="form-control select2" style="width: 100%;" data-placeholder="Sélectionner un utilisateur">
                    <!-- Options des utilisateurs -->
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Bannières associées au Spot</h5>
                <select id="associatedBanners" class="form-control select2" style="width: 100%;" multiple data-placeholder="Sélectionner une ou plusieurs bannières">
                    <!-- Options des bannières associées -->
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Spots filtrés</h5>
                <select id="filteredSpots" class="form-control select2" style="width: 100%;" data-placeholder="Sélectionner un spot">
                    <!-- Options des spots filtrés -->
                </select>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3 justify-content-center">
    <div class="col-md-6">
        <button id="associateBtn" class="btn btn-primary btn-block">Associer</button>
    </div>
</div>

<script>
$(document).ready(function() {
    // Initialisation des select2
    $('.select2').select2();

    // Simulation de données pour les options des utilisateurs, des bannières et des spots
    var users = [{id: 1, text: "Utilisateur 1"}, {id: 2, text: "Utilisateur 2"}];
    var banners = [{id: 1, text: "Bannière 1"}, {id: 2, text: "Bannière 2"}];
    var spots = [{id: 1, text: "Spot 1"}, {id: 2, text: "Spot 2"}];

    // Ajout des options dans les select2
    users.forEach(function(user) {
        $('#userFilter').append(new Option(user.text, user.id, false, false));
    });

    banners.forEach(function(banner) {
        $('#associatedBanners').append(new Option(banner.text, banner.id, false, false));
    });

    spots.forEach(function(spot) {
        $('#filteredSpots').append(new Option(spot.text, spot.id, false, false));
    });

    // Gestion de l'association
    $('#associateBtn').click(function() {
        var selectedUser = $('#userFilter').val();
        var selectedBanners = $('#associatedBanners').val();
        var selectedSpot = $('#filteredSpots').val();

        // Traitement de l'association
        console.log('Utilisateur sélectionné:', selectedUser);
        console.log('Bannières sélectionnées:', selectedBanners);
        console.log('Spot sélectionné:', selectedSpot);
        
        // Réinitialisation des sélections
        $('.select2').val(null).trigger('change');
    });
});
</script>

@endsection
