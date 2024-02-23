@extends('frontend.main_master')
@section('content')

<@extends('frontend.main_master')
@section('content')

<div class="container">
    <h2>Éditer la Randonnée</h2>
    <form action="{{ route('admin.randos.update', $rando->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="video_link">Lien Vidéo:</label>
            <input type="text" class="form-control" id="video_link" name="video_link" value="{{ $rando->video_link }}">
        </div>

        <div class="form-group">
            <label for="language">Langue:</label>
            <select id="language" name="language" class="form-control">
                <option value="en" {{ app()->getLocale() === 'en' ? 'selected' : '' }}>Anglais</option>
                <option value="fr" {{ app()->getLocale() === 'fr' ? 'selected' : '' }}>Français</option>
            </select>
        </div>

        <div class="form-group">
            <label for="title">Titre:</label>
            <input type="text" class="form-control" id="title" name="translations[title]" value="{{ $rando->getTranslation('title', app()->getLocale()) }}">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="translations[description]">{{ $rando->getTranslation('description', app()->getLocale()) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>

@endsection



