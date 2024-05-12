<div>
    @if($spot && !is_null($spot->img360))
        <div id="panorama" style="width: 100%; height: 500px;"></div>
    @endif
    <script>
         document.addEventListener('livewire:load', function() {
        console.log("Livewire is fully loaded.");
    });
    </script>
</div>
