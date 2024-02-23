@extends('frontend.main_master')
@section('content')

<div class="container">
    <h2>Éditer la Randonnée</h2>
    <h4> {{ $rando->spot->name }}</h4>
    <form id="editForm" action="{{ route('admin.randos.update', $rando->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="languageSelect">Langue:</label>
            <select id="languageSelect" class="form-control" name="selected_lang">
                @foreach($langs as $lang)
                    <option value="{{ $lang }}">{{ strtoupper($lang) }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="title">Titre:</label>
            <input type="text" class="form-control" id="title" name="title" value="">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>

        <div class="form-group">
            <label for="video_link">Lien Vidéo:</label>
            <input type="text" class="form-control" id="video_link" name="video_link" value="{{ $rando->video_link }}">
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
document.addEventListener('DOMContentLoaded', function() {
    var translations = @json($rando->translations->keyBy('locale')->toArray());
    var languageSelect = document.getElementById('languageSelect');

    function updateFields() {
        var selectedLang = languageSelect.value;
        document.getElementById('title').value = translations[selectedLang] ? translations[selectedLang].title : '';
        document.getElementById('description').value = translations[selectedLang] ? translations[selectedLang].description : '';
    }

    languageSelect.addEventListener('change', updateFields);
    updateFields(); // Update fields on initial load
});
</script>

@endsection
