@extends('frontend.main_master')

@section('content')
<div class="container">
    <h1>Gestion des dossiers utilisateurs</h1>

    {{-- Sélection de l'utilisateur --}}
    <div class="mb-4">
        <select id="userSelect" class="form-control">
            <option value="">Sélectionner un utilisateur</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Affichage dynamique des dossiers affectés et disponibles --}}
    <div id="foldersContainer"></div>
</div>
@endsection

@section('scripts')

document.addEventListener('DOMContentLoaded', function() {
    const userSelect = document.getElementById('userSelect');
    const foldersContainer = document.getElementById('foldersContainer');

    userSelect.addEventListener('change', function() {
        const userId = this.value;
        if (userId) {
            fetch(`/admin/userfolder/folders/${userId}`)
            .then(response => response.json())
            .then(data => {
                foldersContainer.innerHTML = ''; // Réinitialiser le contenu

                // Traitement et affichage des données reçues
                if (data.assignedFolders && data.assignedFolders.length > 0) {
                    const assignedFoldersList = document.createElement('ul');
                    data.assignedFolders.forEach(folder => {
                        const li = document.createElement('li');
                        li.textContent = folder.name + ' ';
                        const removeButton = document.createElement('button');
                        removeButton.textContent = 'Retirer';
                        removeButton.onclick = function() { removeFolder(userId, folder.id); };
                        li.appendChild(removeButton);
                        assignedFoldersList.appendChild(li);
                    });
                    foldersContainer.appendChild(assignedFoldersList);
                } else {
                    foldersContainer.innerHTML = '<p>Aucun dossier affecté</p>';
                }

                // Ajout d'autres éléments au `foldersContainer` si nécessaire
            })
            .catch(error => console.error('Erreur:', error));
        } else {
            foldersContainer.innerHTML = '<p>Veuillez sélectionner un utilisateur.</p>';
        }
    });
    
    function removeFolder(userId, folderId) {
    // Confirmation avant suppression
    if (!confirm('Êtes-vous sûr de vouloir retirer ce dossier ?')) return;

    // Envoie de la requête pour retirer le dossier
    fetch(`/admin/userfolder/remove/${userId}/${folderId}`, {
        method: 'DELETE', // ou 'POST', selon la configuration de votre endpoint
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // CSRF token pour la sécurité
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ userId, folderId }), // Pas nécessaire si vous passez userId et folderId dans l'URL
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        }
        throw new Error('Réponse réseau non ok.');
    })
    .then(data => {
        console.log(data.message); // Message de succès ou d'erreur
        // Recharger les dossiers pour l'utilisateur actuellement sélectionné
        userSelect.dispatchEvent(new Event('change'));
    })
    .catch(error => console.error('Erreur lors de la suppression:', error));
}

});

@endsection
