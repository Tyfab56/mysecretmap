<div class="f13">
    <div class="mt-3"><img src="{{$spot->imgpanomedium??''}}" class="max100" ></div>
    <b>{{ __('index.Spot') }} : <span class="orange">{{$titre}}</span></b><br>
        <div class="mt-3"><b>{{ __('index.Description') }}</b> : <span  style="color:grey"> {{$traduction->description?? ''}}</span></div>
        <div class="mt-3"><b>{{ __('index.Accessibilite') }}</b> : <span  style="color:grey">{{$traduction->accessibilite?? ''}}</span></div>
    <div class="mt-3"><b>{{ __('index.Chemin') }}</b> : <span  style="color:grey">{{$traduction->chemin?? ''}}</span></div><br>
    <div class="center"><a href="{{ url('destination') }}/{{ $spot->pays_id }}/{{ $spot->id }}" class="btn btn-primary p5">VOIR TOUTES LES INFOS</a><br>
    <b>{{ __('index.InfoSpot') }}</b></div> 
</div>