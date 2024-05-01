@extends('frontend.main_master')

@section('content')
<div class="container">
    <h1>Portfolio de Médias</h1>

    <form action="{{ route('portfolio.index') }}" method="GET">
        <select name="pays_id" onchange="this.form.submit()">
            <option value="">Sélectionnez un pays</option>
            @foreach($activePays as $pays)
                <option value="{{ $pays->pays_id }}" {{ (request('pays_id') == $pays->pays_id) ? 'selected' : '' }}>{{ $pays->pays }}</option>
            @endforeach
        </select>
        <select name="media_type" onchange="this.form.submit()">
            <option value="">Sélectionnez un type de média</option>
            <option value="photo" {{ (request('media_type') == 'photo') ? 'selected' : '' }}>Photo</option>
            <option value="video" {{ (request('media_type') == 'video') ? 'selected' : '' }}>Vidéo</option>
            <option value="film" {{ (request('media_type') == 'film') ? 'selected' : '' }}>Film</option>
        </select>
    </form>

    <div class="row">
        @foreach ($shareMedias as $media)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ $media->thumbnail_link }}" alt="{{ $media->title }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $media->title }}</h5>
                        <p class="card-text">{{ $media->credits ? 'Credits: '.$media->credits : '' }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $shareMedias->links() }}
    </div>
</div>
@endsection
