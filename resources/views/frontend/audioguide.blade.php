@extends('frontend.main_master')
@section('content')
<section class="pad_section">

    <div class="container pad_container_16">
        <div class="content-wrapper pb-4">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="text-wrapper">
                        <h6 class="card-title mbr-fonts-style display-2"><strong>Audioguide Islande</strong></h6>
                        <p class="mbr-text mbr-fonts-style mb-4 display-7">
                            Découvrez l'Islande en compagnie du photographe Fabrice H<br><br>J'ai conçu cet audioguide pour Iphone, Android et windows, à destination des amateurs de photographies qui ont envie de découvrir cette fantastique destination. Il existe actuellement en Français et en anglais. D'autres olangues sont en préparation.<br></p>
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
            <div class="center pt20">
                     <button class="btn btn-primary solid blank" type="submit">Souscrire maintenant</button>
            </div>
           
        </div>
       
    </div>
</section>
<section class="pad_section">
    
    
    <div class="container-fluid">
       
        <div class="row" style="justify-content: center">
            <div class="card audio_features col-md-6 col-lg-3">
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
            <div class="card col-md-6 col-lg-3">
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
            <div class="card col-md-6 col-lg-3">
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
            <h2 class="pt20">ISLANDE : En préparation un audio guide spécial HIGHTLANDS</h2>
        </div>
    </div>
</section>
<section class="pad_section">
   <div class="container-fluid">  
   L'audio guide touristique est un outil indispensable pour tout voyageur qui souhaite découvrir une destination de manière approfondie et personnalisée. Il offre une expérience touristique unique et mémorable. N'hésitez pas à recommander nos audio guides touristiques à vos amis pour les aider à tirer le meilleur parti de leur voyage.
   </br>
   <h3>Une expérience touristique immersive :</h3>
   <p>L'audio guide touristique offre une expérience touristique immersive en fournissant des informations et des anecdotes intéressantes sur les sites touristiques visités. Les touristes peuvent découvrir l'histoire, la culture et les traditions locales en écoutant les commentaires en temps réel. Cela leur permet de mieux comprendre la destination qu'ils visitent et d'apprécier pleinement leur voyage.</p>
   <h3>Une liberté de mouvement :</h3>
   <p>Avec un audio guide touristique, les touristes peuvent explorer les sites touristiques à leur propre rythme. Ils n'ont pas besoin de suivre un guide touristique et peuvent décider de passer plus de temps sur certains sites ou de passer rapidement sur d'autres. Cela leur permet de personnaliser leur expérience touristique et de découvrir les lieux qui les intéressent le plus.</p>
   <h3>Une option de langues multiples :</h3>
   <p>Les audio guides touristiques sont disponibles en plusieurs langues, ce qui permet aux touristes de découvrir les sites touristiques dans leur propre langue maternelle. Cela facilite la compréhension et l'appréciation des informations fournies par l'audio guide et permet aux touristes de se sentir plus à l'aise pendant leur voyage.</p>
   <h3>Une solution pratique et économique :</h3>
   <p>L'audio guide touristique est une solution pratique et économique pour les voyageurs. Il est facile à utiliser, directement disponible sous forme d'application sur votre smartphone et ne nécessite pas l'embauche d'un guide touristique coûteux. Certains audio guides sont génériques, d'autres plus spécialisé sur certaines régions</p>
</div>
</section>

@endsection

@section('fullscripts')

<script type="module" src="https://unpkg.com/@deckdeckgo/demo@latest/dist/deckdeckgo-demo/deckdeckgo-demo.esm.js"></script>
<script nomodule="" src="https://unpkg.com/@deckdeckgo/demo@latest/dist/deckdeckgo-demo/deckdeckgo-demo.js"></script>


@endsection