<div>
    @if($spot && !is_null($spot->img360))
            <div id="panorama" style="width: 100%; height: 500px;"></div>
    @endif

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum/build/pannellum.css"/>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/pannellum/build/pannellum.js"></script>
@endpush
<script>
document.addEventListener('livewire:load', function() {
    console.log("Spot object on load:", @json($spot));
    pannellum.viewer('panorama', {
        "type": "equirectangular",  // Type de panorama, assurez-vous que cela correspond à votre image
        "panorama": "",
        "autoLoad": true  // Charge automatiquement le panorama
    });
});
</script>

</div>