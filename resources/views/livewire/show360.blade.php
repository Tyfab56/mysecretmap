<div>
    @if($spot && !is_null($spot->img360))
        <img src="{{ $spot->img360 }}" alt="360 View" style="width: 100%; height: auto;">
    @endif

<div id="panorama"></div>
<div wire:loading.remove>
<script>
   pannellum.viewer('panorama', {
        "type": "equirectangular",
        "panorama": "",
        "autoLoad": true
    });
</script>   
</div>


</div>