
var mapindex = L.map('mapindex',{minZoom: 2,maxZoom: 6});
mapindex.setView([15, 0], 1);
var markers = L.markerClusterGroup({chunkedLoading: true,maxClusterRadius: 30});
var currentpays;

mapindex.whenReady(
  function(){
       @foreach($markerspays as $marker)
        markers.addLayer(L.marker([{{$marker->lat}}, {{$marker->lng}}],
        { title: '{{$marker->pays}}',id:'{{$marker->pays_id}}' 
        }).on('click', onmapClick).bindTooltip(`<p class='pinText'></p>
        <p>{{$marker->pays}}</p>`, {
        minWidth : 130
        }));
@endforeach

});

function onmapClick(e) {
currentpays = e.sourceTarget.options.id;
var url='{{route('destination',['id'])}}';
url = url.replace('id',currentpays);
window.location.href = url;

}
mapindex.addLayer(markers);


var gl = L.mapboxGL({
attribution: "\u003ca href=\"https://carto.com/\" target=\"_blank\"\u003e\u0026copy; CARTO\u003c/a\u003e \u003ca href=\"https://www.maptiler.com/copyright/\" target=\"_blank\"\u003e\u0026copy; MapTiler\u003c/a\u003e \u003ca href=\"https://www.openstreetmap.org/copyright\" target=\"_blank\"\u003e\u0026copy; OpenStreetMap contributors\u003c/a\u003e",
style: 'https://api.maptiler.com/maps/voyager/style.json?key=iooFuVAppzuUB4nSQMl6'
}).addTo(mapindex);

mapindex._layersMaxZoom = 19;
var markers = L.markerClusterGroup({chunkedLoading: true,maxClusterRadius: 30});

const swiper = new Swiper('.swiper', {
           
    slidesPerView: "auto",
    freeMode: true,
    spaceBetween: 3,


    
  });
