<div>
@if($spot && !is_null($spot->img360))
        <img src="{{ $spot->img360 }}" alt="360 View" style="width: 100%; height: auto;" data-pano-src="{{ $spot->img360 }}">
    @endif

</div>