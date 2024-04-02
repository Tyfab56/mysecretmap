@if($folders->isEmpty())
    <div class="alert alert-info">Aucun dossier trouvé.</div>
@else
    <div class="list-group">
        @foreach($folders as $folder)
            <div class="list-group-item d-flex justify-content-between align-items-center">
                {{ $folder->name }}
                <button class="btn btn-primary btn-sm add-folder-btn" data-folder-id="{{ $folder->id }}" data-folder-name="{{ $folder->name }}">Ajouter</button>
            </div>
        @endforeach
    </div>
@endif

<script>
$(document).ready(function() {
    $('.add-folder-btn').click(function() {
    var folderId = $(this).data('folder-id');
    var userId = $('#detailColumn').data('selected-user-id'); // Assurez-vous que cet ID est stocké quelque part sur la page

    $.ajax({
        url: '/admin/userfolder/addFolderToUser', // Mettez à jour avec l'URL appropriée
        type: 'POST',
        data: {
            userId: userId,
            folderId: folderId,
            _token: $('meta[name="csrf-token"]').attr('content') // Récupère le jeton CSRF
        },
        success: function(response) {
            // Gérez la réponse en cas de succès
            alert(response.success);
            // Peut-être rafraîchir la liste des dossiers pour cet utilisateur
            // Rafraîchir la liste des dossiers pour cet utilisateur
            loadUserFolders(userId);
        },
        error: function(xhr, status, error) {
            // Gérez les erreurs
            console.error(error);
            alert('Une erreur est survenue');
        }
    });
});

function loadUserFolders(userId) {
        $.ajax({
            url: `/admin/userfolder/${userId}/folders`, // Assurez-vous que l'URL est correcte
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
});
</script>
