


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
        
       