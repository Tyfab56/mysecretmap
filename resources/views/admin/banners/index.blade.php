@extends('frontend.main_master')


@section('content')

<h1 class="mx-3" >Liste des Bandeaux</h1>
<a href="{{ route('banners.create') }}" class="btn btn-primary mx-3">Ajouter un Bandeau</a>
<div class="mx-3"> 
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Utilisateur</th>
            <th>Titre</th>
            <th>Image</th>
            <th>Actif</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($banners as $banner)
        <tr>
            <td>{{ $banner->id }}</td>
            <td>{{ $banner->user->name }} {{ $banner->user->prenom }}</td>
            <td>{{ $banner->title }}</td>
            <td><img src="{{ $banner->image_url }}" alt="banner image" width="100"></td>
            <td>{{ $banner->active ? 'Oui' : 'Non' }}</td>
            <td>
                <a href="{{ route('banners.edit', $banner->id) }}" class="btn btn-info">Modifier</a>
                <form action="{{ route('banners.destroy', $banner->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection