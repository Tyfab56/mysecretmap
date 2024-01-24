@extends('frontend.main_master')
@section('content')
<form method="POST" action="/contact">
    @csrf
    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom" required>
    <br>

    <label for="prenom">Prénom</label>
    <input type="text" id="prenom" name="prenom" required>
    <br>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>
    <br>

    <label for="texte">Texte</label>
    <textarea id="texte" name="texte" required></textarea>
    <br>

    <button type="submit">Envoyer</button>
</form>
@endsection