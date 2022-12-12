<div>
   
    @isset($spot)
    
    <div class="mt-3"><b>{{ __('index.Description') }}</b> : <span  style="color:grey"> {{$traduction->description?? ''}}</span></div><br>
    <p><b>Lat : </b><span  style="color:grey">{{ $spot->lat??''}}<br><b>Lng : </b>{{ $spot->lng??''}}</span></p>
    <div class="mt-3"><b>{{ __('index.Accessibilite') }}</b> : <span  style="color:grey">{{$traduction->accessibilite?? ''}}</span></div>
    <div class="mt-3"><b>{{ __('index.Chemin') }}</b> : <span  style="color:grey">{{$traduction->chemin?? ''}}</span></div><br>
    <p><b>{{ __('index.Randotime') }} : </b><span  style="color:grey">{{ $randotime??''}}</span><br><b>{{ __('index.Timeonsite') }} : </b><span  style="color:grey">{{ $timeonsite??''}}</span></p>
    <div class="mt-3"><b>{{ __('index.Drone') }}</b> : <span  style="color:grey">{{$traduction->drone?? ''}}</span></div>
    <div class="mt-3"><b>{{ __('index.Lumiere') }}</b> : <span  style="color:grey">{{$traduction->lumiere?? ''}}</span></div>
    <div class="mt-3"><b>{{ __('index.Secretspot') }}</b> : <span  style="color:grey">{{$traduction->secretspot?? ''}}</span></div>
    @else
    <b>{{ __('destination.useTitle') }}</b><br>
    {{ __('destination.usePart1') }} <br>
    <b>{{ __('destination.useTitle2') }}</b> <br>
    {{ __('destination.usePart2') }} <br>

    @endisset


</div>