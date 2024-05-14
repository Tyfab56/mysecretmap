<div class="img-container">


    @isset ($spot->imgvueregionmedium)
    @empty($spot->imgvueregionmedium)
    <img class="br5 img-image" src="{{asset('frontend/assets/images/nopic.jpg')}}">
    <div class="img-overlay">{{ __('destination.ImageMissing') }} : Spot Area Image ({{$spot->id}})</div>
    @else
    <a href="{{$spot->imgvueregionlarge??''}}" data-lightbox="area"><img class="br5 img-image" src="{{$spot->imgvueregionmedium??''}}"> </a>
    <div class="img-overlay">{{ __('destination.SpotArea') }}</div>
    @endempty
    @else


    @endif
</div>