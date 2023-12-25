@extends('frontend.main_master')
@section('content')
<div class="container">
    <h1>Liste des Hôtels</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    


    <div class="container">
    <div class="row pb-2">
    <a href="{{ route('admin.hotels.create') }}" class="btn btn-primary">Ajouter un nouvel hôtel</a>
    </div>
    <div class="row">
        <!-- Colonne pour la table -->
        <div class="col-md-8">
        <table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Ville</th>
            <th>Pays</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($hotels as $hotel)
        <tr>
            <td>{{ $hotel->name }}</td>
            <td>{{ $hotel->city }}</td>
            <td>{{ $hotel->pays->libelle ?? 'Non spécifié' }}</td>
            <td>
                <a href="{{ route('admin.hotels.edit', $hotel->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                {{-- Bouton ou lien pour supprimer un hôtel --}}
                <form action="{{ route('admin.hotels.destroy', $hotel->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

        </div>

        <!-- Colonne pour la carte -->
        <div class="col-md-4">
            <div id="map" style="height: 400px;">
                {{-- Ici, vous pouvez intégrer votre carte --}}
            </div>
        </div>
    </div>
</div>

@endsection