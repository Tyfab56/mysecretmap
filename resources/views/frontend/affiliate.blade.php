@extends('frontend.main_master')
@section('content')
<div class="ud-main-content">
    <!-- Introduction au Programme d'Affiliation -->
    <div class="intro-affiliation">
        <p>Rejoignez le programme d'affiliation de MySecretMap et aidez votre communauté à découvrir les plus belles destinations grâce à nos audioguides. Ensemble, explorons, apprenons et prospérons.</p>
        <a href="https://mysecretmap.bixgrow.com" class="ud-btn ud-btn-large ud-btn-brand">Rejoignez-nous Maintenant !</a>
       
    </div>

    <!-- Avantages de Devenir Partenaire Affilié -->
    <div class="avantages-affiliation">
        <ul>
            <li>Chaque année nous ajoutons 2 nouvelles destinations à notre catalogue</li>
            <li>Un contenu à forte valeur ajouté pour votre communauté</li>
            <li>Générez des revenus grâce à des commissions compétitives.</li>
        </ul>
    </div>

    <!-- Ressources pour les Affiliés -->
    <div class="ressources-affiliation">
        <h4>Ressources affiliées</h4>
        <ul>
            <li><a href="https://mysecretmap.bixgrow.com">Comment s'inscrire</a></li>
        </ul>
    </div>

    <!-- FAQ du Programme d'Affiliation -->
    <div class="faq-affiliation">
        <h4>FAQ du programme d'affiliation</h4>
        <ul>
            <li><strong>Combien d'argent puis-je gagner ?</strong> Nous offrons des taux de commission compétitifs.</li>
            <li><strong>Que dois-je promouvoir ?</strong> C'est vous qui décidez ! Vous choisissez les cours et les liens.</li>
            <li><strong>Ai-je accès aux promotions et aux réductions spéciales ?</strong> Oui, en tant que partenaire affilié.</li>
            <li><strong>Combien de temps faut-il pour commencer ?</strong> Inscrivez-vous aujourd'hui, et nous étudierons votre demande.</li>
        </ul>
    </div>
</div>
<style>

/* Styles pour les liens */
a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

/* Styles pour le contenu principal */
.ud-main-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    margin: 20px auto;
    max-width: 800px;
}

/* Styles pour les titres */
h4 {
    color: #444;
    margin-top: 20px;
    border-bottom: 1px solid #eee;
    padding-bottom: 10px;
}

/* Styles pour les listes */
ul {
    list-style-type: none;
    padding: 0;
}

ul li {
    padding: 10px 0;
    border-bottom: 1px solid #eee;
}

ul li:last-child {
    border-bottom: none;
}



/* Styles spécifiques pour certaines sections */
.intro-affiliation p {
    font-size: 1.1em;
}

.avantages-affiliation, .ressources-affiliation {
    margin-top: 20px;
}

/* FAQ spécifique */
.faq-affiliation ul {
    margin-top: 10px;
}

.faq-affiliation li strong {
    font-weight: bold;
}

</style>

@endsection