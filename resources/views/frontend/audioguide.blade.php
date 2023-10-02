@extends('frontend.main_master')
@section('content')
<section class="pad_section">

    <div class="container pad_container_16">
        <div class="pt-4 pb-4">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="text-wrapper">
                    <div class="row align-items-center">
                        <div class="col-md-2 center ">
                            <img src="{{ asset('frontend/assets/images/charly_80.png')}}" alt="charly" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h1 class="card-title mbr-fonts-style"><strong>{{ __('audioguide.AudioTitre') }}</strong></h1>
                            <h6 class="card-title mbr-fonts-style"><strong>{{ __('audioguide.AudioSubTitre') }}</strong></h6>
                        </div>
                    </div>
                        <p class="mbr-text mbr-fonts-style mb-4 display-7">
                        {{ __('audioguide.AudioDesc') }}</p>
                        <!-- Première ligne de trois images -->
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4">
        <img src="{{ asset('frontend/assets/images/audioguide_demo1.jpg') }}" alt="Description de l'image 1" class="img-fluid">
        <p class="subpic">{{ __('audioguide.Image1') }}</p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <img src="{{ asset('frontend/assets/images/audioguide_demo2.jpg') }}" alt="Description de l'image 2" class="img-fluid">
        <p class="subpic">{{ __('audioguide.Image2') }}</p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <img src="{{ asset('frontend/assets/images/audioguide_demo3.jpg') }}" alt="Description de l'image 3" class="img-fluid">
        <p class="subpic">{{ __('audioguide.Image3') }}</p>
    </div>
</div>

<!-- Deuxième ligne de trois images -->
<div class="row mt-4"> <!-- mt-4 ajoute une marge en haut pour espacer les deux lignes -->
    <div class="col-lg-4 col-md-4 col-sm-4">
        <img src="{{ asset('frontend/assets/images/audioguide_demo4.jpg') }}" alt="Description de l'image 4" class="img-fluid">
        <p class="subpic">{{ __('audioguide.Image4') }}</p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <img src="{{ asset('frontend/assets/images/audioguide_demo5.jpg') }}" alt="Description de l'image 5" class="img-fluid">
        <p class="subpic">{{ __('audioguide.Image5') }}</p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <img src="{{ asset('frontend/assets/images/audioguide_demo6.jpg') }}" alt="Description de l'image 6" class="img-fluid">
        <p class="subpic">{{ __('audioguide.Image6') }}</p>
    </div>
</div>

                           
                    </div>
                </div>
                <div class="col-lg-4 center"> 
                                   
                <div class="center mt-2">
                    <h6 class="white">{{ __('destination.pubaudio1') }}</h6>
                </div>

             
              <!-- Texte -->
              <p class="lightgray">{{ __('destination.pubaudio2') }}</p>
               <!-- Petite image -->
               <div class="center mb-2">
                   <img src="{{asset('frontend/assets/images/tostore.png')}}" alt="Store" width="100">
              </div>

              <!-- Bouton -->
              <div class="center">
              <a href="{{ route('tostore') }}">
                  <button type="button" class="btn btn-primary">{{ __('destination.pubaudio3') }}</button>
              </a>
              </div>           
                                    
                                    
                </div>
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
                        <h5 class="card-title mbr-fonts-style display-7"><strong>{{ __('audioguide.AdvTitre1') }}</strong></h5>
                        <p class="card-text mbr-fonts-style display-7">{{ __('audioguide.AdvDesc1') }}</p>
                    </div>
                </div>
            </div>
            <div class="card col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-box align-center">
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri-cash mobi-mbri"></span>
                        </div>
                        <h5 class="card-title mbr-fonts-style display-7"><strong>{{ __('audioguide.AdvTitre2') }}</strong></h5>
                        <p class="card-text mbr-fonts-style display-7">{{ __('audioguide.AdvDesc2') }}</p>
                    </div>
                </div>
            </div>
            <div class="card col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-box align-center">
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri-like mobi-mbri"></span>
                        </div>
                        <h5 class="card-title mbr-fonts-style display-7"><strong></strong>{{ __('audioguide.AdvTitre3') }}<strong><br></strong></h5>
                        <p class="card-text mbr-fonts-style display-7">{{ __('audioguide.AdvDesc3') }}</p>
                    </div>
                </div>
               
            </div>
            <h2 class="pt20">{{ __('audioguide.SubTitre1') }}</h2>
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