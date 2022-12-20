<div>
    <div class="f13">
        @guest
           <div class="mt-3"><h3 class="white center">{{ __('index.PourCommencer') }}</h3></div>
           <div class="mt-3"><h4 class="white center"><a class="linkorange" href="{{ URL::route('login')}}">{{ __('index.ConnectezVous') }}</a></h4><br>
        @endguest
      
            <div class="mt-3"><b class="white">Choisir un point </b></div>
            <div class="mt-3"><b class="white">{{ __('index.Accessibilite') }} :</b> <span  class="white"></span></div>
        <div class="mt-3"><b class="white">{{ __('index.Chemin') }} :</b> <span  class="white"></span></div><br>
        <div class="center"><a href="{{ url('destination') }}/" class="btn btn-primary p5">VOIR TOUTES LES INFOS</a><br>
        <b class="white">{{ __('index.InfoSpot') }}</b></div> 
    </div>
    <h1 class="white">{{ __('index.NoSpot') }}</h1>
        
       
    </div>