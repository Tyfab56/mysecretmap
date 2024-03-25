@extends('frontend.main_master')

@section('content')
<div class="container">
    <h1>Gestion des Dossiers</h1>
    <p>Bienvenue sur la page de gestion des dossiers.</p>
    <a href="{{ route('folders.index') }}" class="btn btn-primary">Voir les dossiers</a>
    <!-- Vous pouvez ajouter d'autres boutons ou liens ici -->
</div>
@endsection
