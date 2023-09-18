@extends('frontend.main_master')
@section('content')
<div class="banner">
    <img src="banner-tourism-1.jpg" alt="My Secret Map" class="banner-image">
    <div class="banner-content">
        <h1>Faites rayonner votre destination </h1>
        <p>Révélez vous avec nos solutions numériques innovantes</p>
    </div>
</div>
<section class="presentation-section">
    <h2>Qui sommes-nous?</h2>
    <p class="description">
    Chez My Secret Map, le tourisme est plus qu'une mission : c'est une passion. Née de spécialistes en promotion touristique, notre vision est simple : chaque destination est unique. Chaque coin du monde a son histoire, sa culture, sa magie. Avec nos outils numériques avant-gardistes, nous aidons les offices du tourisme à dévoiler cette magie et à toucher un plus grand nombre de voyageurs. 
    </p>
</section>

<div class="card-container">

    <!-- Card 1: Assistant de voyage numérique / Audioguide -->
    <div class="card">
        <img src="path_to_your_image_for_card_1.jpg" alt="Assistant de voyage image">
        <h3>Assistant de voyage numérique / Audioguide</h3>
        <p>Découvrez des lieux emblématiques avec notre assistant numérique. Profitez de guides audio immersifs et enrichissez votre expérience touristique.</p>
    </div>

    <!-- Card 2: Outil de préparation au voyage -->
    <div class="card">
        <img src="path_to_your_image_for_card_2.jpg" alt="Outil de préparation au voyage image">
        <h3>Outil de préparation au voyage</h3>
        <p>Planifiez vos voyages avec notre outil intuitif. Organisez des circuits, découvrez des spots incontournables et personnalisez vos points d'intérêt.</p>
    </div>

    <!-- Card 3: Contenu et opération clé en main pour réseaux sociaux -->
    <div class="card">
        <img src="path_to_your_image_for_card_3.jpg" alt="Contenu pour réseaux sociaux image">
        <h3>Contenu et opération clé en main pour réseaux sociaux</h3>
        <p>Boostez votre présence en ligne avec du contenu prêt à l'emploi. Engagez votre audience avec des opérations marketing ciblées sur les principaux réseaux sociaux.</p>
    </div>

</div>
<!-- Section 1: Assistant de voyage numérique / Audioguide -->
<div class="service-section bg-blue">
    <img src="path/to/smartphone-icon.png" alt="Smartphone Icon">
    <h2>Assistant de voyage numérique / Audioguide</h2>
    <p>Des guides audio interactifs qui immergent le voyageur dans l'histoire et la culture de la région.</p>
</div>

<!-- Section 2: Prise de vue sur site -->
<div class="service-section bg-green">
    <img src="path/to/camera-icon.png" alt="Camera Icon">
    <h2>Prise de vue sur site</h2>
    <p>Capturons la beauté unique de votre destination avec des images de haute qualité.</p>
</div>

<!-- Section 3: Multilangue -->
<div class="service-section bg-yellow">
    <img src="path/to/globe-icon.png" alt="Globe Icon">
    <h2>Multilangue</h2>
    <p>Rendez vos contenus accessibles à un public international.</p>
</div>

<!-- Section 4: Cartes interactives avec POI -->
<div class="service-section bg-orange">
    <img src="path/to/map-icon.png" alt="Map Icon">
    <h2>Cartes interactives avec POI</h2>
    <p>Des cartes détaillées et interactives pour aider les touristes à explorer votre région.</p>
</div>
<style>
.banner {
    position: relative;
    width: 100%;
    height: 400px; /* À ajuster selon vos besoins */
    overflow: hidden;
}

.banner-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

.banner-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white; /* Couleur du texte, peut être modifiée selon l'image d'arrière-plan */
    text-align: center;
}

.banner-content h1 {
    font-size: 2.5em; /* Taille du texte principale */
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Ombre pour améliorer la lisibilité */
}

.banner-content p {
    font-size: 1.5em; /* Taille du sous-titre */
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5); /* Ombre pour améliorer la lisibilité */
}
.presentation-section {
    padding: 50px 0;
    text-align: center;
    background-color: #f9f9f9;  /* Une couleur d'arrière-plan claire pour distinguer la section */
}

.presentation-section h2 {
    font-size: 2.5em;
    margin-bottom: 30px;
    color: #333;  /* Une couleur de texte foncée pour le contraste */
}

.description {
    font-size: 1.2em;
    color: #666;  /* Une couleur de texte plus légère pour le paragraphe */
    max-width: 800px; /* Limiter la largeur pour une meilleure lisibilité */
    margin: 0 auto;   /* Centrer le paragraphe si sa largeur est inférieure à celle de la section */
    line-height: 1.5; /* Espacement entre les lignes pour une meilleure lisibilité */
}
.card-container {
    display: flex;
    justify-content: space-between;
    padding: 20px;
}

.card {
    background-color: #fff;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);
    max-width: 300px;
    margin: auto;
    text-align: center;
    border-radius: 8px;
    transition: 0.3s;
    overflow: hidden;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
}

.card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

.card h3 {
    color: #333;
    margin: 20px 0;
}

.card p {
    color: #777;
    padding: 0 20px 20px;
    font-size: 0.9em;
}
.bg-blue {
    background-color: #AEDFF7; /* Une douce nuance de bleu */
}

.bg-green {
    background-color: #A8E6CF; /* Une douce nuance de vert */
}

.bg-yellow {
    background-color: #FFD3B6; /* Une douce nuance de jaune */
}

.bg-orange {
    background-color: #FFAAA5; /* Une douce nuance d'orange */
}
</style>
@endsection