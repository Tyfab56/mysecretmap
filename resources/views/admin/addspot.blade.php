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
<div class="container">
    <section class="content">
        <div class="row">
            <div class="col-6">
                <form method="post" action="{{ route ('admin.spot.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row p-4 ">
                        <input type="hidden" id="spotid" name="spotid" value="{{$spot->id}}">
                        <div class="col-12">
                            @if (Session::get('typeaction') == 'edit')

                            <h3>Modification du spot</h3>

                            @else

                            <h3>Création du spot</h3>

                            @endif

                            <div class="form-group">
                                <input type="checkbox" class="form-check-input" id="actif" name="actif" value="{{$spot->actif}}" @if ($spot->actif == 1) checked @endif>
                                <label class="form-check-label" for="actif">Actif</label>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="payslist" name="payslist" onChange="newPays(event)">
                                    <option value="">Selectionner le pays</option>
                                    @foreach($pays as $pay)

                                    <option value="{{$pay->pays_id}}" {{($spot->pays_id == $pay->pays_id) ? 'selected' : ''}}>{{$pay->pays}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="typespotlist">Type du spot<span class="text-danger">*</span></label>
                                <select class="form-control" id="typespotlist" name="typespotlist">

                                    @foreach($typepoints as $typepoint)

                                    <option value="{{$typepoint->id}}" {{($spot->typepoint_id == $typepoint->id) ? 'selected' : ''}}>{{$typepoint->typepoint}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="titre">Titre du spot<span class="text-danger">*</span></label>
                                <input type="text" id="titre" name="titre" value="{{$spot->name}}" class="form-control unicase-form-control text-input">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="timeonsite">Temps sur site<span class="text-danger">*</span></label>
                                <input id="timeonsite" name="timeonsite" class="form-control timepicker" value="{{$timeonsite}}" />

                            </div>
                            <div class="form-group">
                                <label class="info-title" for="randotime">Temps accès rando<span class="text-danger">*</span></label>
                                <input id="randotime" name="randotime" class="form-control timepicker" value="{{$randotime}}" />

                            </div>

                            <div class="form-group">
                                <label class="info-title" for="Lat">Lat<span class="text-danger">*</span></label>
                                <input type="text" id="lat" name="lat" value="{{$spot->lat}}" class="form-control unicase-form-control text-input" />
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="Lng">Lng<span class="text-danger">*</span></label>
                                <input type="text" id="lng" name="lng" value="{{$spot->lng}}" class="form-control unicase-form-control text-input" />
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="titre">Image panoramique 3/1<span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="file" name="imgpano" class="form-control" id="imgpano">

                                    <div class="help-block"></div>
                                    @error('imgpano')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class=" text-xs-right  pb-2">
                                <img src="{{$spot->imgpanomedium}}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="imgsquare">Image carrée 1/1<span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="file" name="imgsquare" class="form-control" id="imgsquare">

                                    <div class="help-block"></div>
                                    @error('imgsquare')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class=" text-xs-right  pb-2">
                                <img src="{{$spot->imgsquaremedium}}">
                            </div>
							<div class="form-group">
                                <label class="info-title" for="imgsquare">Image vue région<span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="file" name="imgregion" class="form-control" id="imgregion">

                                    <div class="help-block"></div>
                                    @error('imgvueregion')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class=" text-xs-right  pb-2">
                                <img src="{{$spot->imgvueregionmedium}}">
                            </div>
							
							<div class="form-group">
                                <label class="info-title" for="imgmap">Image carte Globale<span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="file" name="imgmap" class="form-control" id="imgmap">

                                    <div class="help-block"></div>
                                    @error('imgmap')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class=" text-xs-right  pb-2">
                                <img src="{{$spot->imgmapmedium}}">
                            </div>
                            <div class=" text-xs-right">
                                <input type="submit" name="file" class="btn btn-rounded btn-primary mb-5" value="Mise à jour">
                                <input name="retour" class="btn btn-rounded btn-secondary mb-5" onclick="javascript:history.go(-1)" value="Retour à la Liste">
                            </div>
                            <div class=" text-xs-right">
                                @if (isset($previousspot))
                                <input name="precedent" class="btn btn-rounded btn-secondary mb-5" onclick="previous()" value="Precedent">
                                @endif
                                @if (isset($nextspot))
                                <input name="precedent" class="btn btn-rounded btn-secondary mb-5" onclick="next()" value="Suivant">
                                @endif  
                            </div>

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                        </div>


                    </div>

                </form>
            </div>
            <div class="col-6">
                <div class="row">
                    <div id="map"></div>
                    <form method="post" action="{{ route ('admin.spot.textstore') }}">
                        @csrf
                        <div class="row p-4 ">
                            <input type="hidden" id="spotid" name="spotid" value="{{$spot->id}}">
                            <div class="col-12">
                                <h3>Gestion des textes</h3>

                                <div class="form-group">
                                    <select class="form-control" id="langlist" name="langlist" onChange="newLang({{$spot->id}},event)">
                                        <option value="">Selectionner la langue</option>
                                        @foreach($langs as $lang)

                                        <option value="{{$lang->idlang}}" {{$spotlang == $lang->idlang ? 'selected' : ''}}>{{$lang->libelle}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="description">Description<span class="text-danger">*</span></label>
                                    <input type="text" id="description" name="description" value="{{$spot->translate($spotlang)->description ?? ''}}" class="form-control unicase-form-control text-input">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="accessibilite">Accessibilité<span class="text-danger">*</span></label>
                                    <input type="text" id="accessibilite" name="accessibilite" value="{{$spot->translate($spotlang)->accessibilite?? ''}}" class="form-control unicase-form-control text-input">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="chemin">Chemin<span class="text-danger">*</span></label>
                                    <input type="text" id="chemin" name="chemin" value="{{$spot->translate($spotlang)->chemin?? ''}}" class="form-control unicase-form-control text-input">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="drone">Drone<span class="text-danger">*</span></label>
                                    <input type="text" id="drone" name="drone" value="{{$spot->translate($spotlang)->drone ?? ''}}" class="form-control unicase-form-control text-input">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="lumiere">Lumiere<span class="text-danger">*</span></label>
                                    <input type="text" id="lumiere" name="lumiere" value="{{$spot->translate($spotlang)->lumiere ?? ''}}" class="form-control unicase-form-control text-input">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="secretspot">Secret spot<span class="text-danger">*</span></label>
                                    <input type="text" id="secretspot" name="secretspot" value="{{$spot->translate($spotlang)->secretspot ?? ''}}" class="form-control unicase-form-control text-input">
                                </div>
                                <div class=" text-xs-right">
                                    <input type="submit" name="file" class="btn btn-rounded btn-primary mb-5" value="Validation texte">

                                </div>
                            </div>
                    </form>
                </div>
            </div>
    </section>
</div>
@endsection
@section('scripts')
var marker;


function newPays(event)
{
var selectElement = event.target;
var value = selectElement.value;
var url='{{route('admin.detailpays',['Id'])}}';
url = url.replace('Id', value);
$.ajax({
type : 'get',
url : url,
success: function(res){
map.panTo(new L.LatLng(res.lat, res.lng));

if (marker instanceof L.Marker) {
map.removeLayer(marker);
};
marker = L.marker([res.lat,res.lng], {draggable: true}).addTo(map);
marker.on('dragend', function(event) {

var latlng = event.target.getLatLng();
document.getElementById("lat").setAttribute('value', latlng.lat);
document.getElementById("lng").setAttribute('value', latlng.lng);
});
},
error: function(res){
console.log('Failed');
console.log(res);
}
});
}


var map = L.map('map', {
fullscreenControl: true,
fullscreenControlOptions: {
position: 'topleft'
}
}).setView([0,0], 5);
var gl = L.mapboxGL({
style: 'https://api.maptiler.com/maps/hybrid/style.json?key=iooFuVAppzuUB4nSQMl6'
})
.addTo(map);

function previous ()
{
var url='{{route('admin.spot.edit',['id','lang'])}}';
url = url.replace('id',{{$previousspot->id ?? ''}}).replace('lang', '{{$spotlang}}');
window.location.href = url;
}

function next ()
{
var url='{{route('admin.spot.edit',['id','lang'])}}';
url = url.replace('id',{{$nextspot->id ?? ''}}).replace('lang', '{{$spotlang}}');
window.location.href = url;
}

function newLang(id,event)
{
var selectElement = event.target;
var value = selectElement.value;
var url='{{route('admin.spot.edit',['id','lang'])}}';
url = url.replace('id',id).replace('lang', value);
window.location.href = url;

}
function retourListe()
{
window.location.href = '{{ Route('admin.listspots') }}';
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
};


$('.timepicker').datetimepicker({
format: 'HH:mm',
icons: {
up: 'fa fa-chevron-up',
down: 'fa fa-chevron-down',
previous: 'fa fa-chevron-left',
next: 'fa fa-chevron-right'
}
});

@if (Session::get('typeaction') == 'edit')


@endif

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
  <script type="text/javascript" src="{{asset('frontend/assets/js/map.js')}}"></script>
@endsection