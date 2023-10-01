<div class="f14 white">
    @if(($spot->audioguide == 1))

                <div class="center white">
                    <h6>{{ __('destination.pubaudio1') }}</h6>
                </div>

             
              <!-- Texte -->
              <p>{{ __('destination.pubaudio2') }}</p>
               <!-- Petite image -->
               <div class="center">
                   <img src="{{asset('frontend/assets/images/tostore.png')}}" alt="Store" width="100">
              </div>

              <!-- Bouton -->
              <div class="center">
              <a href="{{ route('tostore') }}">
                  <button type="button" class="btn btn-primary">{{ __('destination.pubaudio3') }}</button>
              </a>
              </div>
      @endif
    <div class="mt-3 white img-relative"> 
      <a href="{{$spot->imgpanolarge??''}}" data-lightbox="pano"><img src="{{$spot->imgpanomedium??''}}" class="max100 mb5 responsive intense" >
      <img src="{{asset('frontend/assets/images/zoom.png')}}" id="imgloupe">
      </a>
    </div>
    <b class="white">{{ __('index.Spot') }} : <span class="orange">{{$titre}}</span></b><br>
    <b class="white">Lat : <span class="orange">{{$spot->lat}}</span></b><br>
    <b class="white">Lng : <span class="orange">{{$spot->lng}}</span></b><br>
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