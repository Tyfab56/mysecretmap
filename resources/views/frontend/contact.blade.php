@extends('frontend.main_master')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h1>Formulaire de contact</h1>
        <form method="POST" action="/contact">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="texte" class="form-label">Texte</label>
                <textarea class="form-control" id="texte" name="texte" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</div>
@endsection