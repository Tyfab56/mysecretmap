@extends('frontend.main_master')


@section('content')
<div class="container">
    <h1>Créer un nouveau dossier</h1>
    <form action="{{ route('admin.folders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nom du dossier</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('admin.folders.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
