<div>
    @if($spot && !is_null($spot->img360))
        <div id="panorama" style="width: 100%; height: 500px;"></div>
    @endif   
    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum/build/pannellum.css"/>
    @endpush

    @push('scripts')
<script src="https://cdn.jsdelivr.net/npm/pannellum/build/pannellum.js"></script>
<script>
    function initializePanorama(imageUrl) {
        if (imageUrl && imageUrl.length > 0) {
            pannellum.viewer('panorama', {
                "type": "equirectangular",
                "panorama": imageUrl,
                "autoLoad": true
            });
        }
    }

    document.addEventListener('livewire:load', function() {
        @if($spot && !is_null($spot->img360))
        initializePanorama("{{ asset('storage/' . $spot->img360) }}");
        @endif
    });

    Livewire.on('updatePanorama', imageUrl => {
        initializePanorama(imageUrl);
    });
</script>
@endpush

</div>

