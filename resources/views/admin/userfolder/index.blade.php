@extends('frontend.main_master')

@section('content')
<div class="container">
    <div class="row">
        <!-- Colonne de filtrage des utilisateurs -->
            <div class="col-md-4">
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
    $('.user-item').click(function(e) {
        e.preventDefault();
        var userId = $(this).data('user-id');
        $.ajax({
            url: `/admin/userfolder/${userId}/folders`, // Modifiez l'URL selon vos routes
            type: 'GET',
            success: function(data) {
                $('#folderColumn').html(data);
            },
            error: function(error) {
                console.error(error);
                alert('Une erreur s\'est produite lors de la récupération des dossiers.');
            }
        });
    });
});
</script>
@endsection
