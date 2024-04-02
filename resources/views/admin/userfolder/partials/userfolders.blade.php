@forelse($folders as $folder)
    <div class="card">
        <div class="card-body">
            {{ $folder->name }}
            <button class="btn btn-danger remove-folder-btn" data-folder-id="{{ $folder->id }}">Supprimer</button>
        </div>
    </div>
@empty
    <p>Aucun dossier associé.</p>
@endforelse