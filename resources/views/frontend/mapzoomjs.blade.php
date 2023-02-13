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

