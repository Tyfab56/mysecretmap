@extends('frontend.main_master')

@section('content')
<div class="container">
    <h1>Portfolio de Médias</h1>

    <form action="{{ route('portfolio.index') }}" method="GET" class="mb-4">
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <input type="text" name="search" placeholder="Rechercher par titre..." value="{{ request('search') }}" class="form-control">
        </div>
        <div class="col-md-3 mb-3">
            <select name="pays_id" class="custom-select" onchange="this.form.submit()">
                <option value="">Sélectionnez un pays</option>
                @foreach($activePays as $pays)
                    <option value="{{ $pays->pays_id }}" {{ (request('pays_id') == $pays->pays_id) ? 'selected' : '' }}>{{ $pays->pays }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <select name="media_type" class="custom-select" onchange="this.form.submit()">
                <option value="">Sélectionnez un type de média</option>
                <option value="photo" {{ (request('media_type') == 'photo') ? 'selected' : '' }}>Photo</option>
                <option value="video" {{ (request('media_type') == 'video') ? 'selected' : '' }}>Vidéo</option>
                <option value="film" {{ (request('media_type') == 'film') ? 'selected' : '' }}>Film</option>
            </select>
        </div>
        <div class="col-md-2 mb-3">
            <button type="submit" class="btn btn-primary btn-block">Filtrer</button>
        </div>
    </div>
</form>


<div class="gallery-wrapper" id="gallery-wrapper">
        @foreach ($shareMedias as $media)
            <div class="picture-item" data-groups="{{ $media->media_type }}">
                <img src="{{ $media->thumbnail_link }}" alt="{{ $media->title }}" class="media-thumbnail">
                @if ($media->media_type === 'video' || $media->media_type === 'film')
                    <!-- Vidéo cachée jusqu'au survol -->
                    <video class="media-video" preload="none" style="display: none;">
                        <source src="{{ $media->preview_link }}" type="video/mp4">
                        Votre navigateur ne supporte pas la balise vidéo.
                    </video>
                @endif
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $shareMedias->links() }}
    </div>
</div>
<style>
    .form-control, .custom-select {
        max-width: 100%;
    }
    .btn-primary {
        background-color: #0056b3; /* Couleur principale de votre thème */
    }
</style>
@endsection
@section('fullscripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mediaItems = document.querySelectorAll('.picture-item');

        mediaItems.forEach(item => {
            const video = item.querySelector('.media-video');
            const image = item.querySelector('.media-thumbnail');

            if (video) {
                item.addEventListener('mouseover', () => {
                    video.style.display = 'block';
                    video.play();
                });

                item.addEventListener('mouseout', () => {
                    video.style.display = 'none';
                    video.pause();
                    video.currentTime = 0;
                });
            }
        });
    });
</script>
@endsection
