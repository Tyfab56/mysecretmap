@extends('frontend.main_master')
@section('scripts')
$(document).ready(function(){
    $('input[type=radio]').click(function(){
        if (this.name == "tri")
        window.location.href = "{{ url('thewall') }}/{{ $idpays}}/"+this.id;
    });
});
@endsection
@section('content')
<section id="news" class="news">
    <div class="container">
      <div class="row "><h1 class="centerdiv">{{$pays->pays}}</h1></div>
      <div class="row "><h2 class="centerdiv">{{ __('destination.TousSpots') }}</h2></div>
      <div class="row "><h4 class="centerdiv">{{ __('destination.RandomSpots') }}</h4></div>
      <div class="row fit-inline pr-3">
           
         
        <div>  
                <label class="radio-inline pl-3">
                      <input type="radio" id="1" name="tri" checked> {{ __('index.WallSort1') }}
                </label>
        </div>
        <div>
                <label class="radio-inline pl-3">
                      <input type="radio" id="2" name="tri"> {{ __('index.WallSort2') }}
                </label>
        </div>
        <div>
              <label class="radio-inline pl-3">
                    <input type="radio" id="3" name="tri"> {{ __('index.WallSort3') }}
              </label>
            
       </div>
     </div>
      <div class="row wall-center">
         
        @foreach($spots as $spot)
        <div class="img-relative">
            @if ($spot->imgsquaresmall) 
            <a href="{{ url('destination') }}/{{$idpays }}/{{ $spot->id }}"> <img style="width: 130px;height: 130px;" class="imgwall img-wall br5" src="{{$spot->imgsquaresmall??''}}"></a>  
            @else
            <a href="{{ url('destination') }}/{{$idpays }}/{{ $spot->id }}"> <img class="imgwall img-wall br5" src="{{$spot->imgpanosmall??''}}"></a>  
            @endif
            <div class="img-walloverlay">{{$spot->name??''}}</div>
        </div>
        @endforeach
      </div>
    </div>
</section>

@endsection