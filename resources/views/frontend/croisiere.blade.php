@extends('frontend.main_master')
@section('content')

<div class="container mt-5">
            <h1 class="text-center mb-4">{{ __('audioguide.CroisiereTitre') }}</h1>

            <!-- Image en dessous -->
            <div class="text-center">
                <img src="{{ asset('frontend/assets/images/charly_80.png') }}" alt="Description de l'image" class="img-fluid mb-4">
            </div>

    <p>Le secteur des croisières est riche et diversifié, offrant une multitude d'opportunités pour les audioguides et les assistants de voyage.
    <!-- Bloc 1 -->
    <div class="block mb-5">
        <h3>1. Présentation de la Compagnie de Croisière</h3>
        <!-- Insérez votre image ici -->
        <!-- <img src="path_to_your_image.jpg" alt="Description"> -->
        <ul>
            <li>Histoire de la compagnie et de ses navires.</li>
            <li>Présentation des dirigeants et équipages, humaniser le service.</li>
            <li>Explication des valeurs et engagements environnementaux et sociaux de la compagnie.</li>
        </ul>
    </div>

    <!-- Bloc 2 -->
    <div class="block mb-5">
        <h3>2. Guide du Navire</h3>
        <!-- Insérez votre image ici -->
        <ul>
            <li>Présentation détaillée des différentes zones du navire : ponts, restaurants, zones de loisirs, cabines, etc.</li>
            <li>Conseils pour optimiser son séjour à bord : meilleures heures pour dîner, comment réserver des activités, etc.</li>
            <li>Informations sur les services à bord : spa, divertissements, sports, etc.</li>
        </ul>
    </div>


<!-- Bloc 3 -->
<div class="block mb-5">
    <h3>3. Informations sur les Escales</h3>
    <!-- Insérez votre image ici -->
    <ul>
        <li>Présentation de chaque escale : histoire, culture, géographie.</li>
        <li>Points d'intérêt majeurs et recommandations d'activités.</li>
        <li>Conseils pratiques : monnaie locale, pourboires, sécurité, etc.</li>
        <li>Légendes et anecdotes locales pour enrichir l'expérience.</li>
    </ul>
</div>

<!-- Bloc 4 -->
<div class="block mb-5">
    <h3>4. Tours et Excursions</h3>
    <!-- Insérez votre image ici -->
    <ul>
        <li>Descriptions détaillées des excursions proposées à chaque escale.</li>
        <li>Contexte historique, culturel, ou naturel associé à chaque excursion.</li>
        <li>Conseils de sécurité et recommandations.</li>
    </ul>
</div>

<!-- Bloc 5 -->
<div class="block mb-5">
    <h3>5. Vie à Bord</h3>
    <!-- Insérez votre image ici -->
    <ul>
        <li>Présentation des événements et activités journaliers : spectacles, conférences, ateliers, etc.</li>
        <li>Informations sur les soirées à thème, les dress codes, etc.</li>
        <li>Conseils pour la vie en mer : mal de mer, sécurité à bord, etc.</li>
    </ul>
</div>

<div class="block mb-5">
    <h3>6. Informations Gastronomiques</h3>
    <!-- Insérez votre image ici -->
    <ul>
        <li>Présentation des différents restaurants et bars à bord.</li>
        <li>Anecdotes sur les chefs, les spécialités, les accords mets-vins.</li>
        <li>Informations sur les spécialités culinaires des destinations visitées.</li>
    </ul>
</div>

<!-- Bloc 7 -->
<div class="block mb-5">
    <h3>7. Éléments Interactifs</h3>
    <!-- Insérez votre image ici -->
    <ul>
        <li>Quizz et jeux basés sur les informations partagées dans l'audioguide.</li>
        <li>Possibilité pour les passagers de laisser des commentaires ou de partager leurs propres anecdotes.</li>
    </ul>
</div>

<!-- Bloc 8 -->
<div class="block mb-5">
    <h3>8. Conseils de Voyage</h3>
    <!-- Insérez votre image ici -->
    <ul>
        <li>Préparation avant l'embarquement.</li>
        <li>Informations sur les formalités douanières et les visas pour les différentes destinations.</li>
        <li>Conseils sur le décalage horaire, la météo, etc.</li>
    </ul>
</div>

<!-- Bloc 9 -->
<div class="block mb-5">
    <h3>9. Engagements Durables</h3>
    <!-- Insérez votre image ici -->
    <ul>
        <li>Informations sur les initiatives écologiques du navire : gestion des déchets, consommation énergétique, etc.</li>
        <li>Conseils pour un tourisme responsable lors des escales.</li>
    </ul>
</div>

<!-- Bloc 10 -->
<div class="block mb-5">
    <h3>10. Services Après-Voyage</h3>
    <!-- Insérez votre image ici -->
    <ul>
        <li>Liens vers des sites recommandés pour partager ses photos et impressions de voyage.</li>
        <li>Possibilité de donner son avis sur l'audioguide et de faire des suggestions pour l'améliorer.</li>
    </ul>
</div>

<p>L'intégration d'audioguides dans le secteur des croisières peut grandement enrichir l'expérience des passagers, tout en offrant aux compagnies un outil supplémentaire pour se différencier dans un marché compétitif.</p>
</div>


@endsection