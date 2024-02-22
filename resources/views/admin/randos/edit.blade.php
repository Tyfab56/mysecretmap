@extends('frontend.main_master')
@section('content')
h2>Éditer la randonnée</h2>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.randos.update', $rando->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Nom de la randonnée:</label>
        <input type="text" name="name" id="name" value="{{ $rando->name }}" required>
    </div>
    <!-- Ajoutez d'autres champs selon votre modèle RandoSpot -->
    <button type="submit">Mettre à jour</button>
</form>

<a href="{{ route('admin.randos.listrandos') }}">Retour à la liste des randonnées</a>
@endsection
