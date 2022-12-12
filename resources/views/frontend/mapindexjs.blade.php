
function onmapClick(e) {
Livewire.emit('InfoSpot',e.sourceTarget.options.id);

}

map.whenReady(function(){
@foreach($markers as $marker)

markers.addLayer(L.marker([{{$marker->lat}}, {{$marker->lng}}],
{ icon: Mark{{$marker->typepoint_id}} ,title: '{{$marker->name}}',id:{{$marker->id}}
}).on('click', onmapClick).bindTooltip(`<p class='pinText'><img src="{{$marker->imgsquaresmall}}" /></p>
<p>{{$marker->name}}</p>`, {
minWidth : 130
}));
@endforeach

});
