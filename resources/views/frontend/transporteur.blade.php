@extends('frontend.main_master')
@section('content')
<div class="container mt-5">
    <!-- Titre en haut -->
    <h1 class="text-center mb-4">Votre Titre Principal</h1>

    <!-- Image en dessous -->
    <div class="text-center">
        <img src="votre_image.jpg" alt="Description de l'image" class="img-fluid mb-4">
    </div>

    <!-- Sous-titre en dessous de l'image -->
    <h2 class="text-center mb-4">Votre Sous-titre</h2>

    <!-- Quatre cards avec des icônes et un texte en dessous -->
    <div class="row">

        <div class="col-md-3 mb-4">
            <div class="card text-center">
                <img src="icone1.png" alt="Description de l'icône 1" class="card-img-top mt-3">
                <div class="card-body">
                    <p class="card-text">Description pour l'icône 1</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card text-center">
                <img src="icone2.png" alt="Description de l'icône 2" class="card-img-top mt-3">
                <div class="card-body">
                    <p class="card-text">Description pour l'icône 2</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card text-center">
                <img src="icone3.png" alt="Description de l'icône 3" class="card-img-top mt-3">
                <div class="card-body">
                    <p class="card-text">Description pour l'icône 3</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card text-center">
                <img src="icone4.png" alt="Description de l'icône 4" class="card-img-top mt-3">
                <div class="card-body">
                    <p class="card-text">Description pour l'icône 4</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Descriptif qui invite à cliquer -->
    <p class="text-center mt-4">Découvrez tous les détails de nos prestations pour chaque catégorie. <a href="lien_vers_detail.html" class="btn btn-primary">En savoir plus</a></p>

@endsection