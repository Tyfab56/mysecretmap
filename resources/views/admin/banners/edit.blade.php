@extends('frontend.main_master')


@section('content')
<h1>{{ isset($banner) ? 'Modifier le Bandeau' : 'Ajouter un Bandeau' }}</h1>
<form action="{{ isset($banner) ? route('banners.update', $banner->id) : route('banners.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($banner))
        @method('PUT')
    @endif
    <div class="form-group">
        <label for="title">Titre:</label>
        <input type="text" class="form-control" name="title" value="{{ $banner->title ?? '' }}" required>
    </div>
    <div class="form-group">
        <label for="image_url">Image URL:</label>
        <input type="text" class="form-control" name="image_url" value="{{ $banner->image_url ?? '' }}" required>
    </div>
    <div class="form-group">
        <label for="redirect_url">URL de redirection:</label>
        <input type="text" class="form-control" name="redirect_url" value="{{ $banner->redirect_url ?? '' }}" required>
    </div>
    <div class="form-group">
        <label>
            <input type="checkbox" name="active" {{ isset($banner) && $banner->active ? 'checked' : '' }}> Actif
        </label>
    </div>
    <button type="submit" class="btn btn-success">{{ isset($banner) ? 'Mettre à jour' : 'Créer' }}</button>
</form>
@endsection