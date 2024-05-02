@extends('frontend.main_master')

@section('content')
<h1>{{ isset($banner) ? 'Modifier le Bandeau' : 'Ajouter un Bandeau' }}</h1>
    <form action="{{ isset($banner) ? route('banners.update', $banner->id) : route('banners.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf
        @if(isset($banner))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="user_id" class="form-label">Utilisateur :</label>
            <select name="user_id" id="user_id" class="form-control select2 select2-search" required>
            </select>
            <div class="invalid-feedback">Veuillez sélectionner un utilisateur.</div>
        </div>
        <div class="form-group">
            <label for="title" class="form-label">Titre:</label>
            <input type="text" class="form-control" name="title" value="{{ $banner->title ?? '' }}" required>
            <div class="invalid-feedback">Veuillez saisir un titre.</div>
        </div>
        <div class="form-group">
            <label for="image_url" class="form-label">Bannière (Image) :</label>
            <input type="file" class="form-control-file" name="image_url" accept="image/*" required>
            <div class="invalid-feedback">Veuillez télécharger une image.</div>
        </div>
        <div class="form-group">
            <label for="redirect_url" class="form-label">URL de redirection:</label>
            <input type="text" class="form-control" name="redirect_url" value="{{ $banner->redirect_url ?? '' }}" required>
            <div class="invalid-feedback">Veuillez saisir une URL de redirection valide.</div>
        </div>
        <div class="form-group">
            <label class="form-check-label">
                <input type="checkbox" name="active" class="form-check-input" {{ isset($banner) && $banner->active ? 'checked' : '' }}> Actif
            </label>
        </div>
        <button type="submit" class="btn btn-success">{{ isset($banner) ? 'Mettre à jour' : 'Créer' }}</button>
    </form>
<script>
$(document).ready(function() {
    $('.select2-search').select2({
        ajax: {
            url: '/admin/users/search', // URL de votre route pour récupérer les utilisateurs
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: data.map(function(user) {
                        return {
                            id: user.id,
                            text: user.text
                        };
                    })
                };
            },
            cache: true
        },
        placeholder: 'Recherchez un utilisateur...',
        minimumInputLength: 2 // Nombre minimum de caractères pour déclencher la recherche
    });
});
</script>
@endsection