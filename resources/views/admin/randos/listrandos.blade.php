@extends('frontend.main_master')
@section('content')
<h2>Liste des randonnées</h2>
<a href="{{ route('admin.randos.create') }}">Ajouter une nouvelle randonnée</a>
<form action="{{ route('admin.randos.listrandos') }}" method="GET">
    <input type="text" name="search" placeholder="Rechercher par nom" value="{{ request('search') }}">
    <button type="submit">Rechercher</button>
</form>
<table class="rando-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($randos as $rando)
            <tr>
                <td>{{ $rando->id }}</td>
                <td> {{ $rando->spot->name }}</td>
                <td>{{ $rando->description }}</td>
                <td>
                    {{-- Supposons que vous avez des liens ou des boutons pour les actions --}}
                    <a href="{{ route('admin.randos.edit', $rando->id) }}">Éditer</a>
                    <form action="{{ route('admin.randos.destroy', $rando->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr?');">
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
<style>
    .rando-table {
        width: 100%;
        border-collapse: collapse;
    }

    .rando-table, .rando-table th, .rando-table td {
        border: 1px solid #ddd;
    }

    .rando-table th, .rando-table td {
        padding: 8px;
        text-align: left;
    }

    .rando-table th {
        background-color: #04AA6D;
        color: white;
    }

    .rando-table tr:nth-child(even){background-color: #f2f2f2;}

    .rando-table tr:hover {background-color: #ddd;}

    .rando-table td {
        vertical-align: top;
    }
</style>

@endsection

