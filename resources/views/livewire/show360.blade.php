<div>
    <div id="panorama" style="width: 100%; height: 500px;"></div>
    
    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum/build/pannellum.css"/>
    @endpush

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/pannellum/build/pannellum.js"></script>
    <script>
        document.addEventListener('livewire:load', function () {
            @if($spot && $spot->img360)
            pannellum.viewer('panorama', {
                "type": "equirectangular",
                "panorama": "{{ asset('storage/' . $spot->img360) }}",
                "autoLoad": true
            });
            @endif
        });
    </script>
@endpush
</div>
