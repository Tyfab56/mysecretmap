<div class="img-container">


    @isset ($spot->imgvueregionmedium)
    @empty($spot->imgvueregionmedium) 
    <img class="br5 img-image" src="{{asset('frontend/assets/images/nopic.jpg')}}">
    <div class="img-overlay">{{ __('destination.ImageMissing') }} : Spot Area Image ({{$spot->id}})</div>
    @else
        <img class="br5 img-image" src="{{$spot->imgvueregionmedium??''}}">  
        <div class="img-overlay">{{ __('destination.SpotArea') }}</div>     
    @endempty
@else
   <img class="br5 img-image" src="{{asset('frontend/assets/images/clickmap.jpg')}}">
   <div class="img-overlay">{{ __('destination.SpotClick') }}</div>

@endif 
</div>
