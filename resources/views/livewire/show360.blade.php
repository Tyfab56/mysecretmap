<div>
    @if($spot && !is_null($spot->img360))
        <img src="{{ $spot->img360 }}" alt="360 View" style="width: 100%; height: auto;">
    @endif

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum/build/pannellum.css"/>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/pannellum/build/pannellum.js"></script>
@endpush
<div id="panorama"></div>
<script>
pannellum.viewer('panorama', {
    "type": "equirectangular",
    "panorama": "{{ $spot->img360 }}"
});
</script>
</div>