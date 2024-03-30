@extends('frontend.main_master')


@section('content')
<div class="container">
    <h1>Ajouter un Nouveau Média</h1>
    <a href="{{ route('admin.sharemedias.index') }}" class="btn btn-primary">Retour à la liste</a>

    <form action="{{ route('admin.sharemedias.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="folder_id">Dossier</label>
            <select class="form-control" id="folder_id" name="folder_id">
                @foreach ($folders as $folder)
                <option value="{{ $folder->id }}">{{ $folder->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $defaultTitle)}}" required>
        </div>
        <div class="form-group">
            <label for="media">Fichier Média</label>
            <input type="file" class="form-control-file" id="media" name="media" required>
        </div>
        <div class="form-group">
            <label for="media_type">Type de Média</label>
            <select class="form-control" id="media_type" name="media_type">
                <option value="photo">Photo</option>
                <option value="video">Vidéo</option>
                <option value="film">Film</option>
            </select>
        </div>
        <div class="form-group">
            <label for="credits">Crédits</label>
            <input type="number" class="form-control" id="credits" name="credits" value="1">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
