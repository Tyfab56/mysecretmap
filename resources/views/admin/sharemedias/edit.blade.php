@extends('frontend.main_master')

@section('content')
<div class="container">
    <h1>Modifier le Média</h1>

    <form action="{{ route('admin.sharemedias.update', $shareMedia->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="folder_id">Dossier</label>
            <select class="form-control" id="folder_id" name="folder_id">
                @foreach ($folders as $folder)
                    <option value="{{ $folder->id }}" {{ $shareMedia->folder_id == $folder->id ? 'selected' : '' }}>{{ $folder->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $shareMedia->title }}" required>
        </div>

        <div class="form-group">
            <label for="media_type">Type de Média</label>
            <select class="form-control" id="media_type" name="media_type">
                <option value="photo" {{ $shareMedia->media_type == 'photo' ? 'selected' : '' }}>Photo</option>
                <option value="video" {{ $shareMedia->media_type == 'video' ? 'selected' : '' }}>Vidéo</option>
                <option value="film" {{ $shareMedia->media_type == 'film' ? 'selected' : '' }}>Film</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="credits">Crédits</label>
            <input type="number" class="form-control" id="credits" name="credits" value="{{ $shareMedia->credits }}">
        </div>
        
        <div class="form-group">
            <label>Vignette Actuelle</label>
            <br>
            @if($shareMedia->thumbnail_link)
                <img src="{{ $shareMedia->thumbnail_link }}" alt="Vignette" style="max-width: 100px; max-height: 100px;">
            @else
                Pas de vignette disponible.
            @endif
        </div>
        
        <div class="form-group">
            <label for="thumbnail">Changer la Vignette</label>
            <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
        </div>
        
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection

