<div class="relative">
    <div class="f13 pr15 vertical-center">
    <div class="mt-3"><img src="{{$spot->imgpanomedium??''}}" class="max100 mb5" ></div>
    <b class="white">{{ __('index.Spot') }} : <span class="orange">{{$titre}}</span></b><br>
        <div class="mt-3"><b class="white">{{ __('index.Description') }} :</b> <span  class="white"> {{$traduction->description?? ''}}</span></div>
        <div class="mt-3"><b class="white">{{ __('index.Accessibilite') }} :</b> <span  class="white">{{$traduction->accessibilite?? ''}}</span></div>
    <div class="mt-3"><b class="white">{{ __('index.Chemin') }} :</b> <span  class="white">{{$traduction->chemin?? ''}}</span></div><br>
    <div class="center"><a href="{{ url('destination') }}/{{ $spot->pays_id }}/{{ $spot->id }}" class="btn btn-primary p5">VOIR TOUTES LES INFOS</a><br>
    <b class="white">{{ __('index.InfoSpot') }}</b></div> 
</div>