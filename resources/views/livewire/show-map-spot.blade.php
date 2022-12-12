<div class="f13 white">
    <div class="mt-3 white"><img src="{{$spot->imgpanomedium??''}}" class="max100 responsive intense" ></div>
    <b class="white">{{ __('index.Spot') }} : <span class="orange">{{$titre}}</span></b><br>
        <div class="mt-3"><b>{{ __('index.Description') }}</b> : <span  style="color:white"> {{$traduction->description?? ''}}</span></div>
        <div class="mt-3"><b>{{ __('index.Accessibilite') }}</b> : <span  style="color:white">{{$traduction->accessibilite?? ''}}</span></div>
    <div class="mt-3"><b>{{ __('index.Chemin') }}</b> : <span  style="color:white">{{$traduction->chemin?? ''}}</span></div><br>
    <div style="width:100%" class="mt-3"><b>{{ __('index.Sunrise') }} : <span id="sunrise" class="red">{{ $sunrise??''}}</span></b></div>
    <div style="width:100%" class="mt-3"><b>{{ __('index.Sunset') }} : <span id="sunset" style="color:orange">{{ $sunset??''}}</span></b></div>
    <div class="mt-3"><b>{{ __('index.Randotime') }} : </b><span  style="color:white">{{ $randotime??''}}</span><br><b>{{ __('index.Timeonsite') }} : </b><span  style="color:white">{{ $timeonsite??''}}</span></p></div>
    <div class="mt-3"><b>{{ __('index.Drone') }}</b> : <span  style="color:white">{{$traduction->drone?? ''}}</span></div>
    <div class="mt-3"><b>{{ __('index.Lumiere') }}</b> : <span  style="color:white">{{$traduction->lumiere?? ''}}</span></div>
    <div class="mt-3"><b>{{ __('index.Secretspot') }}</b> : <span  style="color:white">{{$traduction->secretspot?? ''}}</span></div>
</div>