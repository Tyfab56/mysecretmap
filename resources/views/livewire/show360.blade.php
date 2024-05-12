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
        function initializePanorama() {
            if (document.getElementById('panorama') && "{{ $spot->img360 ?? '' }}".length > 0) {
                pannellum.viewer('panorama', {
                    "type": "equirectangular",
                    "panorama": "{{ asset('storage/' . $spot->img360) }}",
                    "autoLoad": true
                });
            }
        }

        document.addEventListener('livewire:load', initializePanorama);
        Livewire.hook('message.processed', (message, component) => {
            initializePanorama(); // Reinitialize the panorama when Livewire updates
        });
    </script>
    @endpush
</div>

