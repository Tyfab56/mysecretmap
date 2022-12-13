@extends('frontend.main_master')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl/1.13.1/mapbox-gl.min.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.Default.css" />
<link rel="stylesheet" href="{{ asset('frontend/assets/css/Control.FullScreen.css')}}" />
<link rel="stylesheet" href="{{ asset('frontend/assets/css/leaflet.extra-markers.min.css')}}" />
@endsection

@section('content')
<section id="news" class="news">
  <div class="container">
    <div class="row text-center">
      <div class="row p-4">
          <a class="btn btn-large btn-success" href="{{route('admin.addspot')}}">Ajouter un spot</a>
      </div>
      <div>
          <!-- Nav tabs -->
         
         
            
                  <div class="container-fluid">
                      <div class="row">

                          <div class="col-8">
                              <table class="table table-bordered">
                                  <thead>
                                      <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Pays</th>
                                          <th scope="col">Titre</th>
                                          <th scope="col">photo</th>
                                          <th scope="col">Actions</th>
                                      </tr>
                                  </thead>
                                  <tbody>


                                      @foreach ($spots as $spot)

                                      <tr onclick="updateMap({{$spot->id}},{{$spot->lat}},{{$spot->lng}})">
                                          <th scope="row">{{$spot->id}}</th>
                                          <td>{{$spot->pays->pays}}</td>
                                          <td>{{$spot->name}}</td>
                                          <td><img src="{{$spot->imgpanosmall}}"></td>
                                          <td style="min-width:160px"><a class="btn btn-sm btn-success" onclick="editMarker({{$spot->id}});">Mise à jour</a> <a class="btn btn-sm btn-warning" onclick="delMarker({{$spot->id}});">Suppr</a><a class="btn btn-sm btn-warning" onclick="social({{$spot->id}});">Social</a></td>
                                      </tr>
                                      @endforeach

                                  </tbody>
                              </table>
                              <div>
                                  {!! $spots->links() !!}
                              </div>
                          </div>

                          <div class="col-4">
                              <div class="row">
                                  <div id="map"></div>
                              </div>
                              <div class="group-form pt-2">
                                  Lat : <input class="input" type="text" id="lattxt" name="lattxt">
                              </div>
                              <div class="group-form pt-2">
                                  Lng : <input class="input" type="text" id="lngtxt" name="lngtxt">
                              </div>
                              <div class="row pl-4 pt-4">
                                  <a class="btn btn-large btn-success" onclick="updateMarker();">Mise à jour</a>




                              </div>



                          </div>
                      </div>
                  </div>
      </div>
      

      <div class="row">

          <div class="row">




              Filtrage pour choisir les pays

              <div>
              </div>
  </section>
</div>



@endsection
@section('scripts')
var currentid;
var marker = L.marker([{{ $spots->first()->lat}},{{ $spots->first()->lng}}], {draggable: true});
var map = L.map('map', {
fullscreenControl: true,
fullscreenControlOptions: {
position: 'topleft'
}
}).setView([{{ $spots->first()->pays->lat}},{{ $spots->first()->pays->lng}}], {{ $spots->first()->pays->zoom}});
var gl = L.mapboxGL({
style: 'https://api.maptiler.com/maps/hybrid/style.json?key=iooFuVAppzuUB4nSQMl6'
})

.addTo(map);

function editMarker (id)
{
let url = '{{route('admin.spot.edit', ['Id'])}}';
url = url.replace('Id', id)
window.location.href = url;
}

function delMarker (id)
{
let url = '{{route('admin.spot.delete', ['Id'])}}';
url = url.replace('Id', id);

Swal.fire({
title: 'Confirmer la suppression?',
text: "Suppression definitive",
type: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Oui, supprimer'
}).then((result) => {
if (result.value) {
window.location.href = url;
}
});
}

function updateMarker()
{
var lat = document.getElementById('lattxt').value;
var lng = document.getElementById('lngtxt').value;
let url = '{{route('admin.latlng.store', ['Id','Latspot','Lngspot'])}}';
url = url.replace('Id', currentid).replace('Latspot', lat).replace('Lngspot', lng);

window.location.href = url;
}

function social()
{
let url = '{{route('admin.social', ['Id'])}}';
url = url.replace('Id', currentid);

window.location.href = url;
}

function updateMap(id, lat, lng) {
currentid = id;
map.panTo(new L.LatLng(lat, lng));
document.getElementById("lattxt").setAttribute('value', lat);
document.getElementById("lngtxt").setAttribute('value', lng);

if (marker instanceof L.Marker) {
map.removeLayer(marker);
};
marker = L.marker([lat, lng]).addTo(map);
marker.dragging.enable();
marker.on('dragend', function(event) {

var latlng = event.target.getLatLng();

document.getElementById("lattxt").setAttribute('value', latlng.lat);
document.getElementById("lngtxt").setAttribute('value', latlng.lng);
});
window.scrollTo({
top: 0,
behavior: 'smooth'
});
}
@endsection

@section('fullscripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl/1.13.1/mapbox-gl.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl-leaflet/0.0.15/leaflet-mapbox-gl.min.js"></script>

  <script src="{{asset('frontend/assets/js/Control.FullScreen.js')}}"></script>
  <script src="{{asset('frontend/assets/js/leaflet-semicircle.js')}}"></script>
  <script src="https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js"></script>
  <script src="{{asset('frontend/assets/js/leaflet.extra-markers.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/suncalc/1.9.0/suncalc.min.js"></script>

@endsection