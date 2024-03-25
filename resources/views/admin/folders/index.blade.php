@extends('frontend.main_master')


@section('content')
<div class="container">
    <h1>Dossiers</h1>
    <a href="{{ route('folders.create') }}" class="btn btn-primary">Créer un nouveau dossier</a>
    <ul class="list-group mt-3">
        @forelse ($folders as $folder)
            <li class="list-group-item">
                {{ $folder->name }}
                <a href="{{ route('admin.folders.edit', $folder->id) }}" class="btn btn-secondary btn-sm">Modifier</a>
                <form action="{{ route('admin.folders.destroy', $folder->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </li>
        @empty
            <li class="list-group-item">Aucun dossier trouvé.</li>
        @endforelse
    </ul>
</div>
@endsection
