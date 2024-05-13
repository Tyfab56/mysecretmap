<div>
@if($spot && !is_null($spot->img360))
        <img id="panorama" src="{{ $spot->img360 }}" alt="360 View" style="width: 100%; height: auto;" data-pano-src="{{ $spot->img360 }}">
        <div id="panorama" style="width: 100%; height: 500px;" data-pano-src="{{ $spot->img360 }}"></div>
    @endif

</div>