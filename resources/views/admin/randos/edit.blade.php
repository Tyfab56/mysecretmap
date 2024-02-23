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
            <select id="languageSelect" name="selected_lang" class="form-control">
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


<div class="max-w-lg mx-auto my-10">
  <div class="testimonial-card bg-white p-6 rounded-lg text-gray-800">
    <div class="flex space-x-4">
      <img class="w-24 h-24 rounded-full border-4 border-yellow-300" src="https://placehold.co/100x100.png" alt="Portrait of Aliya, a client, wearing sunglasses and a floral outfit">
      <div class="flex flex-col justify-center">
        <p class="font-semibold text-lg">Aliya</p>
        <p class="text-yellow-500">Client</p>
      </div>
    </div>
    <div class="mt-4">
      <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipiscing elit. Corporis consequuntur repellendus nemo suscipit explicabo veniam similique quaerat vitae! Alias reprehenderit aliquam temporibus porro iste corupti laboriosam nihil eos? Nemo ratione, prévoyante ! Suscipit, accusantium. Molestias, reiciendis, in nihil perferendis similique voluptas aliquam, nisi consectetur eum, atque nemo sint. Nostrum, répréhensible, quod.</p>
    </div>
  </div> 
</div>

<style>
  .testimonial-card {
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
  }
</style>

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
