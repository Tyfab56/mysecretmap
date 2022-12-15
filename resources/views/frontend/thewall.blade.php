@extends('frontend.main_master')
@section('content')
<section id="news" class="news">
    <div class="container">
      <div class="row "><h1 class="centerdiv">{{$pays->pays}}</h1></div>
      <div class="row "><h2 class="centerdiv">{{ __('destination.TousSpots') }}</h2></div>
      <div class="row "><h4 class="centerdiv">{{ __('destination.RandomSpots') }}</h4></div>
      <div class="row text-center">
         
        @foreach($spots as $spot)
        <div class="img-relative">

            <a href="{{ url('destination') }}/{{$idpays }}/{{ $spot->id }}"> <img class="imgwall img-wall br5" src="{{$spot->imgsquaresmall??''}}"></a>  
            <div class="img-walloverlay">{{$spot->name??''}}</div>
        </div>
        @endforeach
      </div>
    </div>
</section>

@endsection