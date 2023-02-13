@extends('frontend.main_master')
@section('content')
<section>
<div class="container">
<form method="post" action="{{ route ('admin.createzoomid') }}">
@csrf
    <div class="form-group">
                <label class="info-title" for="spotid">Id Spot</label>
                <input type="text" id="spotid" name="spotid" class="form-control unicase-form-control text-input" />
    </div>

    <div class=" text-xs-right">
        <input type="submit" name="file" class="btn btn-rounded btn-primary mb-5" value="Mise à jour">
    </div>
</form>

<div id="zoommap"></div>
</div>
<input onClick='saveMap()' name="file" class="btn btn-rounded btn-primary mt-5 mb-5" value="sauvegarder image">

</section>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl/1.13.1/mapbox-gl.min.css" />


@endsection
@section('fullscripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl/1.13.1/mapbox-gl.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl-leaflet/0.0.15/leaflet-mapbox-gl.min.js"></script>
  <script src="{{asset('frontend/assets/js/leaflet-providers.js')}}"></script>
  <script src="{{asset('frontend/assets/js/dom-to-image.js')}}"></script>
  <script src="{{asset('frontend/assets/js/filesaver.js')}}"></script>
@endsection
@section('scripts')
@include ('frontend.mapzoomjs');

@endsection