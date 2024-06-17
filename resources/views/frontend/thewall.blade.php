@extends('frontend.main_master')

@section('scripts')
$(document).ready(function(){
$('input[type=radio]').click(function(){
if (this.name == "tri")
window.location.href = "{{ url('thewall') }}/{{ $idpays }}/" + this.id;
});
});
@endsection

@section('content')
<section id="news" class="news">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1>{{ $pays->getTranslatedLibelle() }}</h1>
      </div>
      <div class="col-12 text-center mb-3">
        <select class="form-control d-inline-block" style="width: 200px;" id="country-selector" name="country">
          <option value="">Tous les pays</option>
          @foreach($countries as $country)
          <option value="{{ route('thewall', ['idpays' => $country->pays_id]) }}">{{ $country->getTranslatedLibelle() }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center">
        <h2>{{ __('destination.TousSpots') }}</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center">
        <h4>{{ __('destination.RandomSpots') }}</h4>
      </div>
    </div>
    <div class="row justify-content-center mb-3">
      <div class="col-auto">
        <label class="radio-inline pl-3">
          <input type="radio" id="1" name="tri"> {{ __('index.WallSort1') }}
        </label>
      </div>
      <div class="col-auto">
        <label class="radio-inline pl-3">
          <input type="radio" id="2" name="tri"> {{ __('index.WallSort2') }}
        </label>
      </div>
      <div class="col-auto">
        <label class="radio-inline pl-3">
          <input type="radio" id="3" name="tri"> {{ __('index.WallSort3') }}
        </label>
      </div>
    </div>
    <div class="row justify-content-center">
      @foreach($spots as $spot)
      <div class="col-md-2 col-sm-4 col-6 img-relative mb-3">
        <a href="{{ url('destination') }}/{{$idpays }}/{{ $spot->id }}">
          @if ($spot->imgsquaresmall)
          <img class="imgwall img-wall br5" src="{{$spot->imgsquaresmall ?? ''}}">
          @else
          <img class="imgwall img-wall br5" src="{{$spot->imgpanosmall ?? ''}}">
          @endif
        </a>
        <div class="img-walloverlay">{{ $spot->name ?? '' }}</div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<script>
  document.getElementById('country-selector').addEventListener('change', function() {
    var selectedCountryUrl = this.value;
    if (selectedCountryUrl) {
      window.location.href = selectedCountryUrl;
    }
  });
</script>

<style>
  .img-relative {
    position: relative;
    width: 130px;
    height: 130px;
    margin: 5px;
  }

  .img-wall {

    height: 100%;
    object-fit: cover;
    border-radius: 5px;
  }

  .img-walloverlay {
    position: absolute;
    bottom: 0;
    width: 100%;
    background: rgba(0, 0, 0, 0.5);
    color: white;
    text-align: center;
    font-size: 0.8rem;
    padding: 2px 5px;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 100%;
    box-sizing: border-box;
  }
</style>

@endsection