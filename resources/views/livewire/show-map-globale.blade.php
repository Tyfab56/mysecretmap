<div class="img-container">
    @isset($spot->videomap)
        <video  src="{{$spot->videomap}}" autoplay muted controls></video>
    @else
    @isset ($spot->imgmapmedium)
            @empty($spot->imgmapmedium) 
            <img class="br5 img-image" src="{{asset('frontend/assets/images/nopic.jpg')}}">
             <div class="img-overlay">{{ __('destination.ImageMissing') }} : Map Global Image ({{$spot->id}})</div>
            @else
                <img class="br5 img-image" src="{{$spot->imgmapmedium??''}}">  
                <div class="img-overlay">{{ __('destination.SpotGlobal') }}</div>     
            @endempty
    @else
           <img class="br5 img-image" src="{{asset('frontend/assets/images/clickmap.jpg')}}">
           <div class="img-overlay">{{ __('destination.SpotClick') }}</div>

    @endif 
  @endif
</div>
