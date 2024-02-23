@extends('frontend.main_master')
@section('content')

<div class="container">
    <h2>Éditer la Randonnée</h2>
    <h4> {{ $rando->spot->name }}</h4>
    <form id="editForm" action="{{ route('admin.randos.update', $rando->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Sélecteur de Langue --}}
        <div class="form-group">
            <label for="languageSelect">Langue:</label>
            <select id="languageSelect" class="form-control">
                <option value="en">Anglais</option>
                <option value="fr">Français</option>
            </select>
        </div>

        {{-- Champ pour le Lien Vidéo --}}
        <div class="form-group">
            <label for="video_link">Lien Vidéo:</label>
            <input type="text" class="form-control" id="video_link" name="video_link" value="{{ $rando->video_link }}">
        </div>

        {{-- Champs Dynamiques pour Titre et Description --}}
        <div class="form-group">
            <label for="title">Titre:</label>
            <input type="text" class="form-control" id="title" name="translations[title]">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="translations[description]"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>


<script>
$(document).ready(function() {
    // Fonction pour charger les traductions
    function loadTranslations(lang) {
        // Exemple : Charger les traductions depuis un objet JavaScript. 
        // Dans une application réelle, vous pouvez charger ces données via AJAX depuis le serveur.
        var translations = {
            'en': {
                'title': '{{ $rando->getTranslation('title', 'en') }}',
                'description': '{{ $rando->getTranslation('description', 'en') }}'
            },
            'fr': {
                'title': '{{ $rando->getTranslation('title', 'fr') }}',
                'description': '{{ $rando->getTranslation('description', 'fr') }}'
            }
        };

        $('#title').val(translations[lang].title);
        $('#description').val(translations[lang].description);
    }

    // Écouter le changement de langue
    $('#languageSelect').change(function() {
        var selectedLang = $(this).val();
        console.log(selectedLang);
        loadTranslations(selectedLang);
    });

    // Charger initialement les traductions pour la langue sélectionnée
    loadTranslations($('#languageSelect').val());
});
</script>

@endsection
