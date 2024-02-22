@extends('frontend.main_master')
@section('content')
<h2>Liste des randonnées</h2>
<a href="{{ route('admin.randos.create') }}">Ajouter une nouvelle randonnée</a>
<form action="{{ route('admin.randos.listrandos') }}" method="GET">
    <input type="text" name="search" placeholder="Rechercher par nom" value="{{ request('search') }}">
    <button type="submit">Rechercher</button>
</form>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($randos as $rando)
            <tr>
                <td>{{ $rando->name }}</td>
                <td>
                    <a href="{{ route('admin.randos.edit', $rando->id) }}">Éditer</a>
                    <form action="{{ route('admin.randos.destroy', $rando->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $randos->links() }}
@endsection

@endsection