<div>
    @if($spot && !is_null($spot->img360))
        <div id="panorama" style="width: 100%; height: 500px;"></div>
    @endif   
    @push('scripts')
    <script>
                document.addEventListener('livewire:load', function() {
            console.log("Test log without conditions");
        });
    </script>
    @endpush
</div>

