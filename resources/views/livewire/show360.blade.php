<div>
    @if($spot && !is_null($spot->img360))
        <div id="panorama" style="width: 100%; height: 500px;"></div>
    @endif   
    @push('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            @if($spot)
            console.log("Livewire:load - Spot object:", @json($spot));  // Log the entire $spot object
            @else
            console.log("Livewire:load - No spot object available");
            @endif
        });

        Livewire.on('updatePanorama', imageUrl => {
            console.log("Received new image URL via Livewire.on('updatePanorama'):", imageUrl);
        });
    </script>
    @endpush
</div>

