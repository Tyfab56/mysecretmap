var currentDate;
var currentTime;

@if(is_null($spot))
var currentMarker = {{$markers->first()->id??0}};
var currentTitle = '{{$markers->first()->name??0}}';
var currentLat = {{$markers->first()->lat??0}};
var currentLng = {{$markers->first()->lng??0}};
@else
var currentMarker = {{$spot->id}};
var currentTitle = '{{$spot->name}}';
var currentLat = {{$spot->lat??0}};
var currentLng = {{$spot->lng??0}};;

@endif

var sunriseDate;
var sunsetDate;
var sunriseLine;
var sunsetLine;
var hourLine;
var currentpays;

function drawSolar()
{
const DateTime = luxon.DateTime;
var textsunrise,textsunset;
if (sunriseLine !== undefined)
{
  sunriseLine.removeFrom(map);
}

if (sunsetLine !== undefined)
{
  sunsetLine.removeFrom(map);
}
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
  sunriseLine = L.polyline([], {color: 'red'}).addTo(map);
  sunriseLine.addLatLng(L.latLng(currentLat, currentLng));
  sunriseLine.addLatLng(L.latLng(newPoint.latitude, newPoint.longitude));
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
  sunsetLine = L.polyline([], {color: 'orange'}).addTo(map);
  sunsetLine.addLatLng(L.latLng(currentLat, currentLng));
  sunsetLine.addLatLng(L.latLng(newPoint.latitude, newPoint.longitude));
  textsunset = sunsetDate.setLocale("{{app()->getLocale()}}").toFormat("ff");
  
} 

Livewire.emit('InfoDestination',null,textsunrise,textsunset); 

  
var  hourDate = DateTime.fromJSDate(currentDate).setZone("{{$pays->offset}}").set({ hour: currentTime });




var hourPos = SunCalc.getPosition(hourDate, currentLat,currentLng);
var hourAzimuth = hourPos.azimuth * 180 / Math.PI ;

var newPoint = bearingDistance(currentLat, currentLng, 500, hourAzimuth-180);
if (hourLine !== undefined)
{
  hourLine.removeFrom(map);
}


  hourLine = L.polyline([], {color: 'blue'}).addTo(map);
  hourLine.addLatLng(L.latLng(currentLat, currentLng));
  hourLine.addLatLng(L.latLng(newPoint.latitude, newPoint.longitude));



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
  
  function gotomedia (idspot)
  {
  var url='{{route('medias',['id'])}}';
  url = url.replace('id',idspot);
  window.location.href = url;
  }
  
  function changeHour(value)
  {
  currentTime = value;
  document.getElementById('thehour').innerHTML = currentTime;
  drawSolar();
  }

var map = L.map('map').setView([{{$payslat}}, {{$payslng}}],{{$payszoom}});
var gl = L.mapboxGL({
attribution: "\u003ca href=\"https://carto.com/\" target=\"_blank\"\u003e\u0026copy; CARTO\u003c/a\u003e \u003ca href=\"https://www.maptiler.com/copyright/\" target=\"_blank\"\u003e\u0026copy; MapTiler\u003c/a\u003e \u003ca href=\"https://www.openstreetmap.org/copyright\" target=\"_blank\"\u003e\u0026copy; OpenStreetMap contributors\u003c/a\u003e",
style: 'https://api.maptiler.com/maps/voyager/style.json?key=iooFuVAppzuUB4nSQMl6'
}).addTo(map);

map._layersMaxZoom = 19;
var markers = L.markerClusterGroup({chunkedLoading: true,maxClusterRadius: 30});

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


map.addLayer(markers);



function fn(text, count){
return text.slice(0, count) + (text.length > count ? "..." : "");
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
      