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


<div class="testimonial-card">
  <div style="display: flex; gap: 1rem; /* space-x-4 */">
    <img src="https://placehold.co/100x100.png" alt="Portrait of Aliya, a client, wearing sunglasses and a floral outfit">
    <div style="display: flex; flex-direction: column; justify-content: center;">
      <p class="name">Aliya</p>
      <p class="title">Client</p>
    </div>
  </div>
  <div style="margin-top: 1rem; /* mt-4 */">
    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit...</p>
  </div>
</div>

<style>
  body {
    font-family: 'Inter', sans-serif;
    background-color: #f3f4f6; /* bg-gray-100 */
    margin: 0;
    padding: 0;
  }
  .testimonial-card {
    background-color: #ffffff; /* bg-white */
    padding: 1.5rem; /* p-6 */
    border-radius: 0.5rem; /* rounded-lg */
    color: #1f2937; /* text-gray-800 */
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
    max-width: 32rem; /* max-w-lg */
    margin-left: auto;
    margin-right: auto;
    margin-top: 2.5rem; /* my-10 */
    margin-bottom: 2.5rem;
  }
  .testimonial-card img {
    width: 6rem; /* w-24 */
    height: 6rem; /* h-24 */
    border-radius: 9999px; /* rounded-full */
    border: 0.5rem solid #facc15; /* border-4 border-yellow-300 */
  }
  .testimonial-card .name {
    font-weight: 600; /* font-semibold */
    font-size: 1.125rem; /* text-lg */
  }
  .testimonial-card .title {
    color: #d97706; /* text-yellow-500 */
  }
  .testimonial-card p {
    color: #4b5563; /* text-gray-600 */
  }

</style>
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
