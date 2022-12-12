
function onmapClick(e) {
Livewire.emit('InfoDestination',e.sourceTarget.options.id,null,null);
Livewire.emit('ImgRegion',e.sourceTarget.options.id);
Livewire.emit('ImgMap',e.sourceTarget.options.id);
currentMarker = e.sourceTarget.options.id;

  currentTitle = e.sourceTarget.options.title; 
  currentLat = e.latlng.lat;
  currentLng = e.latlng.lng;
  drawSolar();



}




map.whenReady(function(){
@foreach($markers as $marker)

markers.addLayer(L.marker([{{$marker->lat}}, {{$marker->lng}}],
{ icon: Mark{{$marker->typepoint_id}} ,title: '{{$marker->name}}',id:{{$marker->id}}
}).on('click', onmapClick).bindTooltip(`<p class='pintext'><img src="{{$marker->imgsquaresmall}}" /></p>
<p class="textbox">{{$marker->name}}</p>`, {
minWidth : 130
}));

@endforeach


});


function goImage()
{
  var url = '{{ route("addimagespot", ":spotid") }}';
  url = url.replace(':spotid',currentMarker);
  window.location.href=url;

}

function popimage(name,e,lat,lng) {
  currentMarker = e;
  currentLat = lat;
  currentLng = lng;

  Livewire.emit('InfoDestination',e,null,null);
  Livewire.emit('ImgRegion',e);
  Livewire.emit('ImgMap',e);
  var bounds = L.latLng(lat,lng).toBounds(6000)
  map.fitBounds(bounds);
  drawSolar();
  }

function addcircuit()
  {
    @guest
            let url = '{{route('login')}}';
    Swal.fire({
            title: 'Ajouter ce point à votre circuit',
            text: "Se connecter maintenant ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui'
            }).then((result) => {
            if (result.value) {
            window.location.href = url;
                            }
        });
    @endguest
    @auth
    alert('auth');
    @endauth
  }

map.on('moveend', function() {

  var url='{{route('listmarkers',['idpays','nelat','nelng','swlat','swlng'])}}';
  url = url.replace('idpays','{{$idpays}}').replace('nelat', map.getBounds()._northEast.lat)
  .replace('nelng', map.getBounds()._northEast.lng).replace('swlat', map.getBounds()._southWest.lat)
  .replace('swlng',map.getBounds()._southWest.lng);
  
  $.ajax({
      type: "GET",
      url: url
  }).done(function(msg) 
  {
  
          var c = '';
          maxList = 18;
          const liste = JSON.parse(msg);
  
        
          d = '<div class="swiper"><div class="swiper-wrapper">';

          if (liste.length == 0)
            {
              d = d + '<div class="swiper-slide"><img class="imgbox"  src="{{asset('frontend/assets/images/morepicred.jpg')}}"><div class="bottom-center"><span class="textbox"><b>{{ __('destination.SpotEmpty') }}</b></span></div></div>';
            }

          for (var i = 0; i < Math.min(maxList,liste.length); i++) 
          { 
            var obj=liste[i]; d=d + '<div class="swiper-slide"><img class="imgbox" onClick="popimage(\'' + obj.name +'\','+ obj.id +','+ obj.lat+','+ obj.lng +')" src="' +obj.imgsquaresmall+'"><div class="top-right"><img class="addit" src="{{asset('frontend/assets/images/addpic.png')}}" onClick="addcircuit()"></div><div class="bottom-center"><span class="textbox"><b>'+obj.name+'</b></span></div></div>';
          }
          

          if (liste.length > maxList)
          {
            d = d + '<div class="swiper-slide"><img class="imgbox"  src="{{asset('frontend/assets/images/morepicred.jpg')}}"><div class="bottom-center"><span class="textbox"><b>{{ __('destination.SpotExceed') }}</b></span></div></div>';
          }
          d = d + '</div>'; d = d + '</div>';
          
            document.getElementById('medias').innerHTML = d;
           
  
            const swiper = new Swiper('.swiper', {
           
              slidesPerView: "auto",
              freeMode: true,
              spaceBetween: 3,
  
  
              
            });
  
      })
   });
