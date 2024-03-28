@extends('layouts.frontend')

@section('content')
<div class="container">
    <h1>Médias du dossier : {{ $folder->name }}</h1>
    
    <div class="media-filters">
        <button class="filter-button" data-filter="*">Tous</button>
        <button class="filter-button" data-filter=".photo">Photos</button>
        <button class="filter-button" data-filter=".video">Vidéos</button>
        <button class="filter-button" data-filter=".film">Films</button>
    </div>
    
    <div class="grid">
    @foreach($folder->shareMedias as $media)
        <div class="grid-item {{ $media->media_type }}">
            <p>{{ $media->title }}</p>
            @if($media->thumbnail_link)
                <img src="{{ $media->thumbnail_link }}" alt="{{ $media->title }}" style="width: 100%; display: block;">
            @endif
        </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/imagesloaded/4.1.4/imagesloaded.pkgd.min.js"></script>
<script>
$(document).ready(function() {
    var $grid = $('.grid').imagesLoaded( function() {
        // init Masonry after all images have loaded
        $grid.masonry({
            itemSelector: '.grid-item',
            percentPosition: true
        });
    });
    
    // Filter items on button click
    $('.media-filters').on('click', '.filter-button', function() {
        var filterValue = $(this).attr('data-filter');
        $grid.masonry().once('layoutComplete', function() {
            // code to execute after layout
        })
        .masonry('shuffle', filterValue);
    });
});
</script>
@endpush
