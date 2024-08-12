// Initialisation

var currentDate;
var currentTime;
var stopMarker = 0;
var currentGeometry = {!! json_encode($geometry) !!};

@if(is_null($spot))
var currentMarker = {{$markers->first()->id??0}};
var currentTitle = '{{$markers->first()->name??0}}';
var currentLat = {{$markers->first()->lat??0}};
var currentLng = {{$markers->first()->lng??0}};
var currentPays = "IS";
@else
var currentMarker = {{$spot->id}};
var currentTitle = '{{$spot->name}}';
var currentLat = {{$spot->lat??0}};
var currentLng = {{$spot->lng??0}};
var currentPays = "{{$spot->pays_id}}";
@endif

var sunriseDate;
var sunsetDate;
var sunriseLine;
var sunsetLine;
var sunriseZoom;
var sunsetZoom;
var hourLine;
var hourZoom;
var currentOverlay;

function drawSolar()
{
const DateTime = luxon.DateTime;
var textsunrise,textsunset;
if (sunriseLine !== undefined)
{
sunriseLine.removeFrom(mapdest);

}
//if (sunriseZoom !== undefined)
//{
// sunriseZoom.removeFrom(mapzoom);
//}

if (sunsetLine !== undefined)
{
sunsetLine.removeFrom(mapdest);

}
//if (sunsetZoom !== undefined)
//{
// sunsetZoom.removeFrom(mapzoom);
//}
var times = SunCalc.getTimes(currentDate,currentLat,currentLng);
sunriseDate = DateTime.fromJSDate(times.sunrise).setZone("{{$pays->offset}}");
if (sunriseDate.invalid != null)
{
textsunrise ='no Sunrise';
}
else
{

var sunrisePos = SunCalc.getPosition(sunriseDate, currentLat,currentLng);
var sunriseAzimuth = sunrisePos.azimuth * 180 / Math.PI ;
var newPoint = bearingDistance(currentLat, currentLng, 500, sunriseAzimuth -180);
sunriseLine = L.polyline([], {color: 'red'}).addTo(mapdest);
sunriseLine.addLatLng(L.latLng(currentLat, currentLng));
sunriseLine.addLatLng(L.latLng(newPoint.latitude, newPoint.longitude));

//sunriseZoom = L.polyline([], {color: 'red'}).addTo(mapzoom);
//sunriseZoom.addLatLng(L.latLng(currentLat, currentLng));
//sunriseZoom.addLatLng(L.latLng(newPoint.latitude, newPoint.longitude));

textsunrise = sunriseDate.setLocale("{{app()->getLocale()}}").toFormat("ff");

}
sunsetDate = DateTime.fromJSDate(times.sunset).setZone("{{$pays->offset}}");
if (sunsetDate.invalid != null)
{
textsunset = 'no Sunset';
}
else
{
var sunsetPos = SunCalc.getPosition(sunsetDate, currentLat,currentLng);
var sunsetAzimuth = sunsetPos.azimuth * 180 / Math.PI ;
var newPoint = bearingDistance(currentLat, currentLng, 500, sunsetAzimuth-180);
sunsetLine = L.polyline([], {color: 'orange'}).addTo(mapdest);
sunsetLine.addLatLng(L.latLng(currentLat, currentLng));
sunsetLine.addLatLng(L.latLng(newPoint.latitude, newPoint.longitude));

//sunsetZoom = L.polyline([], {color: 'orange'}).addTo(mapzoom);
//sunsetZoom.addLatLng(L.latLng(currentLat, currentLng));
//sunsetZoom.addLatLng(L.latLng(newPoint.latitude, newPoint.longitude));

textsunset = sunsetDate.setLocale("{{app()->getLocale()}}").toFormat("ff");

}

Livewire.emit('InfoDestination',null,textsunrise,textsunset);


var hourDate = DateTime.fromJSDate(currentDate).setZone("{{$pays->offset}}").set({ hour: currentTime });




var hourPos = SunCalc.getPosition(hourDate, currentLat,currentLng);
var hourAzimuth = hourPos.azimuth * 180 / Math.PI ;

var newPoint = bearingDistance(currentLat, currentLng, 500, hourAzimuth-180);
if (hourLine !== undefined)
{
hourLine.removeFrom(mapdest);
}

//if (hourZoom !== undefined)
//{
// hourZoom.removeFrom(mapzoom);
//}


hourLine = L.polyline([], {color: 'blue'}).addTo(mapdest);
hourLine.addLatLng(L.latLng(currentLat, currentLng));
hourLine.addLatLng(L.latLng(newPoint.latitude, newPoint.longitude));

// hourZoom = L.polyline([], {color: 'blue'}).addTo(mapzoom);
// hourZoom.addLatLng(L.latLng(currentLat, currentLng));
// hourZoom.addLatLng(L.latLng(newPoint.latitude, newPoint.longitude));




}

function lngLatArrayToLatLng(lngLatArray) {
return lngLatArray.map(lngLatToLatLng);
}

function lngLatToLatLng(lngLat) {
return [lngLat[1], lngLat[0]];
}

function changeRange(value)
{
const DateTime = luxon.DateTime;
currentDate = getDateFromDayNum(value);
displayDate = DateTime.fromJSDate(currentDate).setLocale("{{app()->getLocale()}}");
document.getElementById('theday').innerHTML = displayDate.toLocaleString({ month: 'long', day: 'numeric' });
drawSolar();
}

function bearingDistance(lat, lon, radius, bearing){
const lat1Rads = toRad(lat);
const lon1Rads = toRad(lon);
const R_KM = 6371; // radius in KM
const d = radius/R_KM; //angular distance on earth's surface

const bearingRads = toRad(bearing);
const lat2Rads = Math.asin(
Math.sin(lat1Rads) * Math.cos(d) + Math.cos(lat1Rads) * Math.sin(d) * Math.cos(bearingRads)
);

const lon2Rads = lon1Rads + Math.atan2(
Math.sin(bearingRads) * Math.sin(d) * Math.cos(lat1Rads),
Math.cos(d) - Math.sin(lat1Rads) * Math.sin(lat2Rads)
);

return {
latitude: toDeg(lat2Rads),
longitude: toDeg(lon2Rads)
}
}

function toRad(degrees){
return degrees * Math.PI / 180;
}

function toDeg(radians){
return radians * 180 / Math.PI;
}

function affiche()
{
Livewire.emit('AfficheVideo',280);
}

function onmapClick(e) {
stopMarker = 1;
Livewire.emit('InfoDestination',e.sourceTarget.options.id,null,null);
Livewire.emit('ImgRegion',e.sourceTarget.options.id);
Livewire.emit('AfficheVideo',e.sourceTarget.options.id);
Livewire.emit('ImgMap',e.sourceTarget.options.id);
chargerEtAfficherVideo(e.sourceTarget.options.id, '{{app()->getLocale()}}' )
Livewire.emit('PictureDestination',e.sourceTarget.options.id);
Livewire.emit('Img360',e.sourceTarget.options.id);

Livewire.emit('loadHotels', e.latlng.lat, e.latlng.lng);
Livewire.emit('updateBanner',e.sourceTarget.options.id);
currentMarker = e.sourceTarget.options.id;
currentTitle = e.sourceTarget.options.title;
currentLat = e.latlng.lat;
currentLng = e.latlng.lng;
addUrlToHistory(currentMarker,currentPays);
var bounds = L.latLng(currentLat,currentLng).toBounds(1000);
//mapzoom.panTo(new L.LatLng(currentLat,currentLng));
redrawOverlay();
drawSolar();
stopMarker = 0;
window.scrollTo({ top: 100, behavior: 'smooth' });
}

var getDateFromDayNum = function(dayNum, year){

var date = new Date();
if(year){
date.setFullYear(year);
}
date.setMonth(0);
date.setDate(0);
var timeOfFirst = date.getTime(); // this is the time in milliseconds of 1/1/YYYY
var dayMilli = 1000 * 60 * 60 * 24;
var dayNumMilli = dayNum * dayMilli;
date.setTime(timeOfFirst + dayNumMilli);
return date;
}

function redrawOverlay()
{
// Appel de l'image manquante
var url='{{route('getzoom',['idspot'])}}';
url = url.replace('idspot',currentMarker);
$.ajax({
type: "GET",
url: url
}).done(function(msg)
{
if (currentOverlay !== undefined)
{
currentOverlay.removeFrom(mapdest);

}
var bounds = recBounds(currentLat,currentLng);


// if (msg.imgZoomLarge)
// {
// currentOverlay = L.imageOverlay(msg.imgZoomLarge,bounds).addTo(mapzoom);
// }


})
}
function recBounds(lat,lng)
{

var southWest = L.latLng(lat - 0.004966634076, lng - 0.02574920654);
var northEast = L.latLng(lat + 0.004966634076, lng + 0.02574920654);

bounds = L.latLngBounds(southWest, northEast);
return bounds;
}

function changeHour(value)
{
currentTime = value;
document.getElementById('thehour').innerHTML = currentTime;
drawSolar();
}

var currentCircuit = {{$circuitactif}};

var mapdest = L.map('mapdest').setView([{{$payslat}}, {{$payslng}}],{{$payszoom}});
var gl = L.mapboxGL({
attribution: "\u003ca href=\"https://carto.com/\" target=\"_blank\"\u003e\u0026copy; CARTO\u003c/a\u003e \u003ca href=\"https://www.maptiler.com/copyright/\" target=\"_blank\"\u003e\u0026copy; MapTiler\u003c/a\u003e \u003ca href=\"https://www.openstreetmap.org/copyright\" target=\"_blank\"\u003e\u0026copy; OpenStreetMap contributors\u003c/a\u003e",
style: 'https://api.maptiler.com/maps/voyager/style.json?key=iooFuVAppzuUB4nSQMl6'
}).addTo(mapdest);

mapdest._layersMaxZoom = 19;
var markers = L.markerClusterGroup({chunkedLoading: true,maxClusterRadius: 30});


//var mapzoom = L.map('mapzoom',{
// dragging: false,
// scrollWheelZoom: 'center'
//}).setView([{{$payslat}}, {{$payslng}}],15);
//var gl = L.mapboxGL({
//style: 'https://api.maptiler.com/tiles/satellite-v2/?key=iooFuVAppzuUB4nSQMl6'
//}).addTo(mapzoom);

//mapzoom.removeControl(mapzoom.zoomControl);

var Mark1 = L.ExtraMarkers.icon({
markerColor: 'blue',
shape: 'circle',
prefix: 'fa'
});
var Mark2 = L.ExtraMarkers.icon({
markerColor: 'blue',
shape: 'circle',
prefix: 'fa'
});
var Mark3 = L.ExtraMarkers.icon({
markerColor: 'black',
shape: 'circle',
prefix: 'fa'
});

var Mark4 = L.ExtraMarkers.icon({
markerColor: 'pink',
shape: 'circle',
prefix: 'fa'
});
var Mark5 = L.ExtraMarkers.icon({
markerColor: 'green',
shape: 'circle',
prefix: 'fa'
});
var Mark6 = L.ExtraMarkers.icon({
markerColor: 'green',
shape: 'circle',
prefix: 'fa'
});

var Mark7 = L.ExtraMarkers.icon({
icon : 'fa-umbrella-beach',
markerColor: 'yellow',
shape: 'circle',
prefix: 'fas'
});

var Mark8 = L.ExtraMarkers.icon({
markerColor: 'green',
shape: 'circle',
prefix: 'fa'
});

var Mark9 = L.ExtraMarkers.icon({
markerColor: 'green',
shape: 'circle',
prefix: 'fa'
});

var Mark10 = L.ExtraMarkers.icon({
markerColor: 'green',
shape: 'circle',
prefix: 'fa'
});


mapdest.addLayer(markers);

mapdest.whenReady(function(){
@foreach($markers as $marker)
var popdiv = '<img class="addit" src="{{asset('frontend/assets/images/addpic.png')}}" onClick="addCircuit({{$marker->id}})">';
var popup = L.popup().setContent(popdiv);
markers.addLayer(L.marker([{{$marker->lat}}, {{$marker->lng}}],
{ icon: Mark{{$marker->typepoint_id}} ,title: '{{$marker->name}}',id:{{$marker->id}}
}).on('click', onmapClick).bindTooltip(`<p class='pintext'><img src="{{$marker->imgsquaresmall}}" /></p>
<p class="textbox">{{$marker->name}}</p>`, {
minWidth : 130,
interactive : true
}).bindPopup(popup));

@endforeach


});



window.addEventListener('load', function () {
// Raffraichir la carte
mapdest.invalidateSize();
//mapzoom.invalidateSize();

// Initialisation du curseur
if (stopMarker == 0 )
{
Livewire.emit('InfoDestination',currentMarker,null,null);
Livewire.emit('ImgRegion',currentMarker);
Livewire.emit('AfficheVideo',currentMarker);
Livewire.emit('ImgMap',currentMarker);
Livewire.emit('ImgPeak',currentMarker);
Livewire.emit('Img360',currentMarker);
chargerEtAfficherVideo(currentMarker, '{{app()->getLocale()}}' )
Livewire.emit('PictureDestination',currentMarker);
Livewire.emit('RefreshCircuit',currentCircuit);
Livewire.emit('loadHotels', currentLat, currentLng);
Livewire.emit('updateBanner',currentMarker);
var myDate = new Date();
var dayInYear = Math.floor((myDate - new Date(myDate.getFullYear(), 0, 0)) / (1000 * 60 * 60 * 24));
document.getElementById("dayofyear").value = dayInYear ;
currentDate = myDate;
currentTime = 12;
const DateTime = luxon.DateTime;
displayDate = DateTime.fromJSDate(currentDate).setLocale("{{app()->getLocale()}}");
document.getElementById('theday').innerHTML = displayDate.toLocaleString({ month: 'long', day: 'numeric' });
document.getElementById('thehour').innerHTML = currentTime;
// Premier point

popimage('',currentMarker,currentLat,currentLng);
drawSolar();
drawCircuit();
}
})



// Initialisation te la zone toggle
var suntoggle = document.getElementById('sunToggle');
var switchery = new Switchery(suntoggle, { size: 'small' });

$("#suntoggle").change(function(){
alert("change here");
});


function drawCircuit()
{
if (currentGeometry !== '')
{
currentGeometry.forEach((element) =>
{
var color;
var r = Math.floor(Math.random() * 255);
var g = Math.floor(Math.random() * 255);
var b = Math.floor(Math.random() * 255);
color= "rgb("+r+" ,"+g+","+ b+")";
var polyline = L.Polyline.fromEncoded(element);
polyline.setStyle(color).addTo(mapdest);

});
}
}
function jedecode (str, precision) {
var index = 0,
lat = 0,
lng = 0,
coordinates = [],
shift = 0,
result = 0,
byte = null,
latitude_change,
longitude_change,
factor = Math.pow(10, Number.isInteger(precision) ? precision : 5);

// Coordinates have variable length when encoded, so just keep
// track of whether we've hit the end of the string. In each
// loop iteration, a single coordinate is decoded.
while (index < str.length) { // Reset shift, result, and byte byte=null; shift=0; result=0; do { byte=str.charCodeAt(index++) - 63; result |=(byte & 0x1f) << shift; shift +=5; } while (byte>= 0x20);

  latitude_change = ((result & 1) ? ~(result >> 1) : (result >> 1));

  shift = result = 0;

  do {
  byte = str.charCodeAt(index++) - 63;
  result |= (byte & 0x1f) << shift; shift +=5; } while (byte>= 0x20);

    longitude_change = ((result & 1) ? ~(result >> 1) : (result >> 1));

    lat += latitude_change;
    lng += longitude_change;

    coordinates.push([lat / factor, lng / factor]);
    }

    return coordinates;
    };


    function copyGPS (){
    document.getElementById('id').select();
    document.execCommand('copy');
    }

    function addtour (){
    var url = '{{ route("addtour", [":spotid",":circuitid"]) }}';
    url = url.replace(':spotid',currentMarker).replace(':circuitid',currentCircuit);
    window.location.href=url;

    }

    function centerMap()
    {
    window.location.href='#mapdest'
    }

    function addUrlToHistory(parametre, pays) {
    var newUrl = 'https://mysecretmap.com/destination/'+pays+'/' + parametre;
    window.history.pushState({path:newUrl},'',newUrl);
    }

    function addCircuit (spotid){
    var url = '{{ route("addtour", [":spotid",":circuitid"]) }}';
    url = url.replace(':spotid',spotid).replace(':circuitid',currentCircuit);
    window.location.href=url+'#mapPos';

    }

    function removetour (idspot){
    var url = '{{ route("removetour", [":idspot",":circuitid"]) }}';
    url = url.replace(':circuitid',currentCircuit).replace(':idspot',idspot);
    window.location.href=url+'#mapPos';

    }

    function refreshtour (){
    var url = '{{ route("refreshtour", [":paysid",":circuitid"]) }}';
    url = url.replace(':paysid','{{$idpays}}').replace(':circuitid',currentCircuit);
    window.location.href=url+'#mapPos';
    }

    function goImage()
    {
    var url = '{{ route("addimagespot", ":spotid") }}';
    url = url.replace(':spotid',currentMarker);
    window.location.href=url;

    }

    var myImages = document.querySelectorAll('.img-image');

    // Changment video

    window.addEventListener('videoChanged', event => {

    });
    function updateMap(spots) {
    clearMarkers();
    sunsetLine.removeFrom(mapdest);
    sunriseLine.removeFrom(mapdest);
    hourLine.removeFrom(mapdest);
    spots.forEach(spot => {
    addMarker(spot);
    });
    }

    // Fonction pour effacer les marqueurs existants
    function clearMarkers() {
    markers.clearLayers();
    }

    function addMarker(spot) {
    var marker = L.marker([spot.lat, spot.lng], {
    icon: getMarkerIcon(spot.typepoint_id),
    title: spot.name,
    id: spot.id
    }).on('click', onmapClick).bindTooltip(
    `<p class='pintext'><img src="${spot.imgsquaresmall}" /></p>
    <p class="textbox">${spot.name}</p>`, {
    minWidth: 130,
    interactive: true
    }).bindPopup(
    `<img class="addit" src="{{asset('frontend/assets/images/addpic.png')}}" onClick="addCircuit(${spot.id})">`
    );

    markers.addLayer(marker);
    }


    function getMarkerIcon(typepoint_id) {
    switch (typepoint_id) {
    case 1: return Mark1;
    case 2: return Mark2;
    case 3: return Mark3;
    case 4: return Mark4;
    case 5: return Mark5;
    case 6: return Mark6;
    case 7: return Mark7;
    case 8: return Mark8;
    case 9: return Mark9;
    case 10: return Mark10;
    default: return Mark1;
    }
    }

    document.querySelectorAll('input[name="spotType"]').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
    const selectedTypes = Array.from(document.querySelectorAll('input[name="spotType"]:checked'))
    .map(cb => cb.value);

    fetch(`/spots?maps_id=${selectedTypes.join(',')}&idpays=${currentPays}`)
    .then(response => response.json())
    .then(data => {
    updateMap(data);
    });
    });
    });





    // Initialisez Zooming
    var zooming = new Zooming({
    // Options de configuration (facultatif)
    });

    // Associez le zoom à tous les éléments sélectionnés
    zooming.listen(myImages);

    function popimage(name,e,lat,lng) {

    currentMarker = e;
    currentLat = lat;
    currentLng = lng;

    Livewire.emit('InfoDestination',e,null,null);
    Livewire.emit('ImgRegion',e);
    Livewire.emit('ImgMap',e);
    Livewire.emit('updateBanner',e);
    var bounds = L.latLng(lat,lng).toBounds(6000);
    mapdest.fitBounds(bounds);
    var bounds = L.latLng(lat,lng).toBounds(500);
    //mapzoom.fitBounds(bounds);
    //mapzoom.panTo(new L.LatLng(lat,lng));
    drawSolar();
    redrawOverlay();
    window.scrollTo({ top: 100, behavior: 'smooth' });
    }

    function chargerEtAfficherVideo(id, locale) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://mysecretmap.com/api/video/' + id + '/' + locale, true);
    xhr.onload = function() {
    if (xhr.status === 200) {
    var data = xhr.responseText;
    if (data) { // Vérifie si data n'est pas vide
    const containerVideo = document.getElementById('container_video');
    containerVideo.innerHTML = '<div id="main_video" src="'+ data + '" width="640" height="360" controls="controls" preload="auto"></div>';
    swarmify.swarmifyVideo("main_video", {
    width: '640px',
    });
    } else {
    console.log('La réponse est vide, la vidéo ne sera pas affichée.');
    }
    } else {
    console.error('Erreur:', xhr.statusText);
    }
    };
    xhr.onerror = function() {
    console.error('Erreur réseau');
    };
    xhr.send();
    }


    mapdest.on('moveend', function() {

    var url='{{route('listmarkers',['idpays','nelat','nelng','swlat','swlng'])}}';
    url = url.replace('idpays','{{$idpays}}').replace('nelat', mapdest.getBounds()._northEast.lat)
    .replace('nelng', mapdest.getBounds()._northEast.lng).replace('swlat', mapdest.getBounds()._southWest.lat)
    .replace('swlng',mapdest.getBounds()._southWest.lng);

    $.ajax({
    type: "GET",
    url: url
    }).done(function(msg)
    {

    var c = '';
    maxList = 18;
    const liste = JSON.parse(msg);


    d = '<div class="swiper">'
      +'<div class="swiper-wrapper">';

        if (liste.length == 0)
        {
        d = d + '<div class="swiper-slide"><img class="imgbox" src="{{asset('frontend/assets/images/morepicred.jpg')}}">'
          +'<div class="bottom-center"><span class="textbox"><b>{{ __('destination.SpotEmpty') }}</b></span></div>'
          +'</div>';
        }

        for (var i = 0; i < Math.min(maxList,liste.length); i++) { var obj=liste[i]; d=d + '<div class="swiper-slide"><img class="imgbox" onClick="popimage(\'' + obj.name +' \','+ obj.id +','+ obj.lat+','+ obj.lng +')" src="' +obj.imgsquaresmall+'">'
          +'<div class="top-right"><img class="addit" src="{{asset('frontend/assets/images/addpic.png')}}" onClick="addcircuit()"></div>'
          +'<div class="bottom-center"><span class="textbox"><b>'+obj.name+'</b></span></div>'
          +'</div>';
      }


      if (liste.length > maxList)
      {
      d = d + '<div class="swiper-slide"><img class="imgbox" src="{{asset('frontend/assets/images/morepicred.jpg')}}">'
        +'<div class="bottom-center"><span class="textbox"><b>{{ __('destination.SpotExceed') }}</b></span></div>'
        +'</div>';
      }
      d = d
      +'</div>'; d = d + '</div>';

    document.getElementById('medias').innerHTML = d;


    const swiper = new Swiper('.swiper', {

    slidesPerView: "auto",
    freeMode: true,
    spaceBetween: 3,



    });

    })
    });