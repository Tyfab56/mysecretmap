@extends('frontend.main_master')



@section('content')
<div class="container">
    <h1>Modifier le dossier</h1>
    <form action="{{ route('folders.update', $folder->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom du dossier</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $folder->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('folders.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
