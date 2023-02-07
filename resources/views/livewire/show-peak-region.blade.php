<div class="img-container">


    @isset ($spot->imgpeakmedium)
    @empty($spot->imgpeakmedium) 
    <img class="br5 img-image" src="{{asset('frontend/assets/images/nopic.jpg')}}">
    <div class="img-overlay">{{ __('destination.ImageMissing') }} : Peak Area Image ({{$spot->id}})</div>
    @else
        <a href="{{$spot->imglargelarge??''}}" data-lightbox="area"><img class="br5 img-image" src="{{$spot->imgpeakmedium??''}}"> </a> 
        <div class="img-overlay">{{ __('destination.SpotPeak') }}</div>     
    @endempty
@else
   <img class="br5 img-image" src="{{asset('frontend/assets/images/clickmap.jpg')}}">
   <div class="img-overlay">{{ __('destination.SpotClick') }}</div>

@endif 
</div>
