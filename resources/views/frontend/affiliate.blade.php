@extends('frontend.main_master')
@section('content')
<div class="ud-main-content">
    <!-- Introduction au Programme d'Affiliation -->
    <div class="intro-affiliation">
        <p> {{ __('audioguide.AffiliateTitre') }}</p>
        <img src="{{ asset('frontend/assets/images/' . app()->getLocale() . '-affiliate.jpg') }}" class="w100">
        <a href="https://mysecretmap.bixgrow.com" class="ud-btn ud-btn-large ud-btn-brand">{{ __('audioguide.AffiliateJoin') }}</a>
       
    </div>

    <!-- Avantages de Devenir Partenaire Affilié -->
    <div class="avantages-affiliation">
        <ul>
            <li>{{ __('audioguide.AffiliateBonus1') }}</li>
            <li>{{ __('audioguide.AffiliateBonus2') }}</li>
            <li>{{ __('audioguide.AffiliateBonus3') }}</li>
        </ul>
    </div>

    <!-- Ressources pour les Affiliés -->
    <div class="ressources-affiliation">
       
        <ul>
            <li><a href="https://mysecretmap.bixgrow.com">{{ __('audioguide.AffiliateHow') }}</a></li>
        </ul>
    </div>

    <!-- FAQ du Programme d'Affiliation -->
    <div class="faq-affiliation">
        <h4>{{ __('audioguide.AffiliateFaq') }}</h4>
        <ul>
        <li>{!! __('audioguide.AffiliateFaq1') !!}</li>
        <li>{!! __('audioguide.AffiliateFaq2') !!}</li>
        <li>{!! __('audioguide.AffiliateFaq3') !!}</li>
        <li>{!! __('audioguide.AffiliateFaq4') !!}</li>
        <li>{!! __('audioguide.AffiliateFaq5') !!}</li>

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