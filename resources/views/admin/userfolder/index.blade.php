@extends('frontend.main_master')

@section('content')
<div class="container">
   
    <div class="row">
        <!-- Colonne de filtrage des utilisateurs -->
            <div class="col-md-4">
            <h3>Utilisateurs</h3>
                <form action="{{ route('admin.userfolder.index') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Rechercher un utilisateur..." name="search" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Rechercher</button>
                        </div>
                    </div>
                </form>
                <div id="searchResults" class="list-group mt-3">
                <!-- Affichez les résultats ici si vous retournez la vue depuis le contrôleur -->
                @foreach($users as $user)
                <a href="#" class="list-group-item list-group-item-action user-item" data-user-id="{{ $user->id }}">
                        {{ $user->name }} - {{ $user->email }}
                </a>
                @endforeach
                </div>
            </div>

        <!-- Colonne pour les dossiers associés à l'utilisateur sélectionné -->
        <div class="col-md-4" >
        <h3>Dossiers associés</h3>
            <div id="folderColumn"><!-- Les dossiers de l'utilisateur sélectionné s'afficheront ici -->
            </div >
        </div>

        <!-- Colonne pour les détails ou actions supplémentaires -->
       
        <div class="col-md-4" id="detailColumn">
            <h3>Ajouter des dossiers</h3>
            <input type="text" id="folderSearchInput" class="form-control mb-2" placeholder="Recherche par titre de dossier">
            <div id="folderList" class="list-group">
                <!-- Liste des dossiers filtrés -->
            </div>
        </div>
    </div>
</div>
<script>

$(document).ready(function() {
    // Gestion du clic sur un utilisateur
    $('.user-item').click(function(e) {
            e.preventDefault();
            var userId = $(this).data('user-id');
        
            // Mémoriser l'ID utilisateur sélectionné pour un usage ultérieur
            $('#detailColumn').data('selected-user-id', userId);
            fetchUserFolders(userId);
        });

        // Recherche dynamique de dossiers
    $('#folderSearchInput').keyup(function() {
            var searchQuery = $(this).val().trim();
            var userId = $('#detailColumn').data('selected-user-id'); // Récupérer l'ID utilisateur sélectionné
            fetchFolders(searchQuery, userId);
        });


function fetchUserFolders(userId) {
            $.ajax({
                url: `/admin/userfolder/${userId}/folders`,
                type: 'GET',
                success: function(data) {
                    $('#folderColumn').html(data);
                },
                error: function(error) {
                    console.error(error);
                    alert('Une erreur s\'est produite lors de la récupération des dossiers.');
                }
            });
        }

function fetchFolders(searchQuery, userId) {
            $.ajax({
                url: `/admin/userfolder/folders/search`, // URL à adapter selon votre application
                type: 'GET',
                data: { search: searchQuery, userId: userId }, // Envoyer la requête de recherche et l'ID de l'utilisateur
                success: function(data) {
                    $('#folderList').html(data);
                    
                },
                error: function(error) {
                    console.error(error);
                    alert('Une erreur s\'est produite lors de la recherche des dossiers.');
                }
            });
        }

  
        $(document).on('click', '.remove-folder-btn', function(e) {
    e.preventDefault();
    var userId = $('#detailColumn').data('selected-user-id'); // Assurez-vous d'avoir cet ID stocké
    var folderId = $(this).data('folder-id');

    if (confirm('Êtes-vous sûr de vouloir supprimer cette association ?')) {
        $.ajax({
            url: '/admin/userfolder/remove', // URL de votre route
            type: 'POST',
            data: {
                userId: userId,
                folderId: folderId,
                _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
            },
            success: function(response) {
                alert(response.success);
                // Rafraîchir la liste des dossiers pour l'utilisateur courant
                fetchUserFolders(userId);
            },
            error: function(response) {
                alert('Erreur lors de la suppression de l\'association.');
            }
        });
    }
});  

});
</script>
@endsection
