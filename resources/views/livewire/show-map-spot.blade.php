<div class="f14 white">
    @if(($spot->audioguide == 1))

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
    @endif
    <div class="md-12  center mt5 ">
        <h1 class="white">{{$titre}}</span></h1><br>
        <img src="{{$spot->imgpanolarge??''}}" class="max100 mb5 responsive intense">

    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <b class="white">Lat : <span class="orange">{{$spot->lat}}</span></b><br>
                <b class="white">Lng : <span class="orange">{{$spot->lng}}</span></b><br>
                <div class="mt-3"><b>{{ __('index.Description') }}</b> : <span style="color:white"> <span id="short-text">{{ Str::limit($traduction->description ?? '', 900) }}</span>
                        <span id="full-text" style="display: none;">{{ $traduction->description ?? '' }}</span>
                        @if(strlen($traduction->description ?? '') > 900)
                        <a href="#" class="orange" id="see-more">Voir plus</a>
                        @endif</span></div>

            </div>
            <div class="col-md-6">
                <div class="mt-3"><b>{{ __('index.Sunrise') }} : <span id="sunrise" class="red">{{ $sunrise??''}}</span></b></div>
                <div class="mt-3"><b>{{ __('index.Sunset') }} : <span id="sunset" style="color:orange">{{ $sunset??''}}</span></b></div>
                <div class="mt-3"><b>{{ __('index.Accessibilite') }}</b> : <span style="color:white">{{$traduction->accessibilite?? ''}}</span></div>
                <div class="mt-3"><b>{{ __('index.Chemin') }}</b> : <span style="color:white">{{$traduction->chemin?? ''}}</span></div>
                <div class="mt-3"><b>{{ __('index.Randotime') }} : </b><span style="color:white">{{ $randotime??''}}</span><br><b>{{ __('index.Timeonsite') }} : </b><span style="color:white">{{ $timeonsite??''}}</span></p>
                </div>
                <div class="mt-3"><b>{{ __('index.Drone') }}</b> : <span style="color:white">{{$traduction->drone?? ''}}</span></div>
                <div class="mt-3"><b>{{ __('index.Lumiere') }}</b> : <span style="color:white">{{$traduction->lumiere?? ''}}</span></div>
                <div class="mt-3"><b>{{ __('index.Secretspot') }}</b> : <span style="color:white">{{$traduction->secretspot?? ''}}</span></div>
            </div>
        </div>
    </div>


</div>