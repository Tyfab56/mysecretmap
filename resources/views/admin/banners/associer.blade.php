@extends('frontend.main_master')

@section('content')
<div class="container">
    <h1>Associer des Bannières aux Spots</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="userFilter">Filtrer par Utilisateur :</label>
                <select name="userFilter" id="userFilter" class="form-control select2-users" style="width: 100%;" required>
                   
                   
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
                <select name="userBanners" id="userBanners" class="form-control" style="width: 100%;" required>
                    <option value="">Sélectionner une bannière</option>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="filteredSpots">Sélectionner un Spot :</label>
                <select name="filteredSpots" id="filteredSpots" class="form-control select2_spots" style="width: 100%;" required>
                    <!-- Les spots filtrés seront chargés ici via AJAX -->
                </select>
            </div>
            <div class="form-group">
                <button id="associateBtn" class="btn btn-primary">Associer</button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    // Initialisation des select2
    var selectedUser;

    $('.select2_spots').select2({
        ajax: {
            url: '/admin/spots/searchbanner', // URL de votre route pour rechercher les spots
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: data.map(function(spot) {
                        return {
                            id: spot.id,
                            text: spot.name
                        };
                    })
                };
            },
            cache: true
        },
        placeholder: 'Recherchez un spot...',
        minimumInputLength: 2 // Nombre minimum de caractères pour déclencher la recherche
    });

    $('.select2-users').select2({
        ajax: {
            url: '/admin/users/search', // URL de votre route pour récupérer les utilisateurs
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: data.map(function(user) {
                        return {
                            id: user.id,
                            text: user.text
                        };
                    })
                };
            },
            cache: true
        },
        placeholder: 'Recherchez un utilisateur...',
        minimumInputLength: 2, // Nombre minimum de caractères pour déclencher la recherche
        // Gestion du changement de sélection d'utilisateur
        dropdownParent: $('#userFilter').parent(),
    });

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       } 
    });

    // Action lors de la sélection d'un utilisateur
    $('#userFilter').on('change', function() {
        selectedUser = $(this).val();

        // Envoi de la requête AJAX pour obtenir les spots associés à l'utilisateur
        $.ajax({
            url: '/admin/users/getAssociatedSpots', // URL de votre route pour obtenir les spots associés
            method: 'POST',
            data: { user_id: selectedUser },
            dataType: 'json',
            success: function(response) {
                // Effacez d'abord le contenu existant de la table
                $('#associatedSpotsBody').empty();

                // Ajoutez les spots associés à la table
                response.forEach(function(spot) {
                    var row = '<tr><td>' + spot.spot_name + '</td><td>' + spot.banner_name + '</td><td><button class="btn btn-danger removeSpot" data-spot-id="' + spot.id + '">Supprimer</button></td></tr>';
                    $('#associatedSpotsBody').append(row);
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        $.ajax({
        url: '/users/getAssociatedBanners', // URL de votre route pour obtenir les bannières associées
        method: 'POST',
        data: { user_id: selectedUser },
        dataType: 'json',
        success: function(response) {
            // Effacez d'abord le contenu existant du select des bannières
            $('#userBanners').empty();

            // Ajoutez les bannières associées au select
            response.forEach(function(banner) {
                var option = '<option value="' + banner.id + '">' + banner.title + '</option>';
                $('#userBanners').append(option);
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
       });
    });
    $('#associateBtn').on('click', function() {
        var selectedSpot = $('#filteredSpots').val();
        var selectedBanner = $('#userBanners').val();

        // Envoi de la requête AJAX pour associer le spot et la bannière
        $.ajax({
                url: '/admin/banners/' + selectedSpot + '/' + selectedBanner + '/' + selectedUser+ '/attach/' +,
                method: 'POST',
                data: { spot_id: selectedSpot, banner_id: selectedBanner, user_id: selectedUser },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    // Réactualiser la liste des spots associés après l'association réussie
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
    });
});


</script>
@endsection
