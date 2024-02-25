@extends('frontend.main_master')
@section('content')
<script>
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif
</script>
<div class="container">
    <h2>Éditer la Randonnée</h2>
    <h4> {{ $rando->spot->name }}</h4>
    <form id="editForm" action="{{ route('admin.randos.update', $rando->id) }}" method="POST" enctype="multipart/form-data">
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
            <input type="text" class="form-control" id="video_link" name="video_link">
        </div>

        <div class="form-group">
                        <label for="poster">Image :</label>
                        <input type="text" name="poster" id="poster" class="form-control">
                </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>




<script>
document.addEventListener('DOMContentLoaded', function() {
    var translations = @json($rando->translations->keyBy('locale')->toArray());
    var languageSelect = document.getElementById('languageSelect');

    function updateFields() {
        var selectedLang = languageSelect.value;
        document.getElementById('title').value = translations[selectedLang] ? translations[selectedLang].nom: '';
        document.getElementById('description').value = translations[selectedLang] ? translations[selectedLang].description : '';
        document.getElementById('video_link').value = translations[selectedLang] ? translations[selectedLang].video_link : '';
    }

    languageSelect.addEventListener('change', updateFields);
    updateFields(); // Update fields on initial load
});
</script>

@endsection
