<div>
    <div id="panorama" style="width: 100%; height: 500px;"></div>
    
    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum/build/pannellum.css"/>
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/pannellum/build/pannellum.js"></script>
        <script>
            document.addEventListener('livewire:load', function () {
                pannellum.viewer('panorama', {
                    "type": "equirectangular",
                    "panorama": "{{$spot->img360}}",
                    "autoLoad": true
                });
            });
        </script>
    @endpush
</div>
