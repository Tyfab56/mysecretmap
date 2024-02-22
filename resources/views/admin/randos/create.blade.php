@extends('frontend.main_master')
@section('content')
<h2>Ajouter une nouvelle randonnée</h2>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.randos.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Nom de la randonnée:</label>
        <input type="text" name="name" id="name" required>
    </div>
    <!-- Ajoutez d'autres champs selon votre modèle RandoSpot -->
    <button type="submit">Ajouter</button>
</form>

<a href="{{ route('admin.randos.listrandos') }}">Retour à la liste des randonnées</a>

@endsection