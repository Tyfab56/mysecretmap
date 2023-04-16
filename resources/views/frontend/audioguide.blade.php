@extends('frontend.main_master')
@section('content')
<section class="pad_section">

    <div class="container pad_container_16">
        <div class="content-wrapper">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="text-wrapper">
                        <h6 class="card-title mbr-fonts-style display-2"><strong>Audioguide Islande</strong></h6>
                        <p class="mbr-text mbr-fonts-style mb-4 display-7">
                            Découvrez l'Islande en compagnie du photographe Fabrice H<br><br>J'ai conçu cet audioguide pour Iphone, Android et windows, à destination des amateurs de photographies qui ont envie de découvrir cette fantastique destination. Il existe actuellement en Français et une version anglaise est en cours de traduction.<br></p>
                            <div class="image-wrapper">
                                <img src="{{ asset('frontend/assets/images/fr-audioguide.jpg')}}" alt="">
                            </div>
                    </div>
                </div>
                <div class="col-lg-4 center">
                                   
                                    <deckgo-demo 
                                                src="https://mysecretmap.com/audioguide_fr"
                                                instant="true"
                                                style="width: 30vw; height: 90vh;">
                                     </deckgo-demo>
                                    
                                    
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pad_section">
    
    
    <div class="container-fluid">
        <div class="row">
            
        </div>
        <div class="row">
            <div class="card audio_features col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-box align-center">
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mbrib-map-pin"></span>
                        </div>
                        <h5 class="card-title mbr-fonts-style display-7"><strong>Gagnez du temps sur la préparation votre voyage</strong></h5>
                        <p class="card-text mbr-fonts-style display-7">Plus de 200 spots à découvrir en audio de façon interactive sur la carte , mais également une version texte avec des liens vers d'autres ressources utiles pour votre voyage.</p>
                    </div>
                </div>
            </div>
            <div class="card col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-box align-center">
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri-cash mobi-mbri"></span>
                        </div>
                        <h5 class="card-title mbr-fonts-style display-7"><strong>Profitez du tarif de lancement</strong><br><strong>dès maintenant</strong></h5>
                        <p class="card-text mbr-fonts-style display-7">Mis en vente le 1er juin au tarif de 12€. En précommande dés maintenant au tarif de 9€ avec accès immédiat aux premiers enregistrements déjà en ligne.</p>
                    </div>
                </div>
            </div>
            <div class="card col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-box align-center">
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri-like mobi-mbri"></span>
                        </div>
                        <h5 class="card-title mbr-fonts-style display-7"><strong>Découvrez les lieux secrets du photographe Fabrice H</strong><strong><br></strong></h5>
                        <p class="card-text mbr-fonts-style display-7">En plus des lieux incontournables, Fabrice vous ouvre des lieux incroyables hors des sentiers touristiques habituels</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

@endsection

@section('fullscripts')

<script type="module" src="https://unpkg.com/@deckdeckgo/demo@latest/dist/deckdeckgo-demo/deckdeckgo-demo.esm.js"></script>
<script nomodule="" src="https://unpkg.com/@deckdeckgo/demo@latest/dist/deckdeckgo-demo/deckdeckgo-demo.js"></script>


@endsection