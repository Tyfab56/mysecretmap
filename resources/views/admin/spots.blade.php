@extends('frontend.main_master')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl/1.13.1/mapbox-gl.min.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.Default.css" />
<link rel="stylesheet" href="{{ asset('frontend/assets/css/Control.FullScreen.css')}}" />
<link rel="stylesheet" href="{{ asset('frontend/assets/css/leaflet.extra-markers.min.css')}}" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
@endsection

@section('content')
@auth
@if (auth()->user()->isAdmin())
<section>
    <div class="container">
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif

        <form method="get" action="{{ route ('admin.filterspots') }}">
            @csrf
            <div class="form-inline">
                <div class="form-group mr-2">
                    <select class="form-control" id="pays" name="pays">
                        <option value="">{{__('destination.SelectDest')}}</option>
                        @foreach($payslist as $pay)
                        <option value="{{$pay->pays_id}}" {{($pays == $pay->pays_id) ? 'selected' : ''}}>{{$pay->pays}} ({{$pay->nbpic}})</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mr-2">
                    <select class="form-control" id="maps" name="maps">
                        <option value="">{{__('destination.SelectMap')}}</option>
                        @foreach($maps as $mymap)
                        <option value="{{$mymap->id}}" {{($map == $mymap->id) ? 'selected' : ''}}>{{$mymap->memo}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mr-2">
                    <input id="search" name="search" type="text" class="form-control" placeholder="Search anything...">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Submit" />
                </div>
            </div>
        </form>

    </div>

</section>
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
                                    <?php
                                    // Vérifier si une traduction en français existe
                                    $hasFrenchTranslation = $spot->hasTranslation('fr');
                                    ?>

                                    <tr onclick="updateMap({{$spot->id}},{{$spot->lat}},{{$spot->lng}})">
                                        <th scope="row" style="{{$hasFrenchTranslation ? '' : 'background-color: red;'}}">{{$spot->id}}({{$spot->nbdistance}})
                                            @if($spot->audioguide)
                                            <i class="fas fa-volume-up" title="Audioguide disponible"></i> <!-- Icône audio -->
                                            @endif
                                        </th>
                                        <td>{{$spot->pays->pays}}</td>
                                        <td>{{$spot->name}}</td>
                                        <td><img src="{{$spot->imgpanosmall}}"></td>
                                        <td style="min-width:160px"><a class="btn btn-sm btn-success" onclick="editMarker({{$spot->id}});">Mise à jour</a>
                                            <a class="btn btn-sm btn-warning" onclick="delMarker({{$spot->id}});">Suppr</a>
                                            <a class="btn btn-sm btn-warning" onclick="social({{$spot->id}});">MAJ infos</a>
                                            <a class="btn btn-sm btn-danger" onclick="deleteDistances({{ $spot->id }});">Suppr Distances</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div>
                                {!! $spots->appends(request()->query())->links() !!}
                            </div>
                        </div>
                        <form id="deleteDistancesForm" action="{{ route('delete.distances') }}" method="POST" style="display:none;">
                            @csrf
                            <input type="hidden" name="point_id" id="pointId">
                        </form>
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
@else
<section id="news" class="news">
    <div class="container">
        <div class="row text-center">
            {{ __('index.NoAccess') }}
        </div>
    </div>
</section>
@endif
@endauth
@guest
<section id="news" class="news">
    <div class="container">
        <div class="row text-center">
            {{ __('index.NoAccess') }}
        </div>
    </div>
</section>
@endguest


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

function social(id)
{
let url = '{{route('distance', ['Id'])}}';
url = url.replace('Id',id);

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

function deleteDistances(pointId) {
if (confirm('Êtes-vous sûr de vouloir supprimer toutes les distances pour ce point ?')) {
document.getElementById('pointId').value = pointId;
document.getElementById('deleteDistancesForm').submit();
}
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



@endsection