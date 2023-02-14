var zoommap = L.map('zoommap',{
   dragging: false,
   scrollWheelZoom: 'center'
}).setView([{{$spot->lat}}, {{$spot->lng}}],15);

var gl = L.mapboxGL({
style: 'https://api.maptiler.com/maps/hybrid/style.json?key=iooFuVAppzuUB4nSQMl6'
});


L.tileLayer.provider('MapBox', {
    id: 'ckw6q1sfm1x7t14mvyft2zpzm',
    accessToken: 'pk.eyJ1IjoibXlsb3ZlbHlwbGFuZXQiLCJhIjoiY2lvM3czamozMDAwdXYza255c2ppbXF2aCJ9.E_AhXKNiU3UiqSdNvq7hkQ'
});

L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
}).addTo(zoommap);

zoommap.removeControl(zoommap.zoomControl);
$('.leaflet-control-attribution').hide();

function saveMap()
{
    var east = zoommap.getBounds().getEast();
    var west=  zoommap.getBounds().getWest();
    var north = zoommap.getBounds().getNorth();
    var south = zoommap.getBounds().getSouth();

    console.log (
        'center:' + zoommap.getCenter() +'\n'+
        'east:' + east +'\n'+
        'west:' + west +'\n'+
        'north:' + north +'\n'+
        'south:' + south +'\n'+

        'size in pixels:' + zoommap.getSize()
    )

    if( 1 == 2)
   {  
       domtoimage.toJpeg(document.getElementById('zoommap'),{width: 1200,height:534})
        .then(function (blob) {
        window.saveAs(blob, '{{$spot->id}}.jpg');
      });
    }
}



