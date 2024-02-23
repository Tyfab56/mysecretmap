@extends('frontend.main_master')
@section('content')

<div class="container">
    <h2>Éditer la Randonnée</h2>
    
    {{-- Sélecteur de Langue --}}
    <div class="form-group">
        <label for="languageSelect">Choisir la Langue :</label>
        <select id="languageSelect" class="form-control">
            @foreach(config('translatable.locales') as $locale)
                <option value="{{ $locale }}" {{ app()->getLocale() == $locale ? 'selected' : '' }}>{{ strtoupper($locale) }}</option>
            @endforeach
        </select>
    </div>

    <form action="{{ route('admin.randos.update', $rando->id) }}" method="post">
        @csrf
        @method('PUT')
        
        {{-- Champ pour le Lien Vidéo --}}
        <div class="form-group">
            <label for="video_link">Lien Vidéo</label>
            <input type="text" name="video_link" id="video_link" class="form-control" value="{{ $rando->video_link ?? '' }}">
        </div>
        
        {{-- Champs de Nom et Description pour la Langue Sélectionnée --}}
        @foreach(config('translatable.locales') as $locale)
            <div class="form-group localeField" id="locale_{{ $locale }}" style="display: none;">
                <label for="title_{{ $locale }}">Titre ({{ strtoupper($locale) }})</label>
                <input type="text" name="translations[{{ $locale }}][title]" class="form-control" value="{{ $rando->translate($locale)->title ?? '' }}">

                <label for="description_{{ $locale }}">Description ({{ strtoupper($locale) }})</label>
                <textarea name="translations[{{ $locale }}][description]" class="form-control">{{ $rando->translate($locale)->description ?? '' }}</textarea>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectedLang = document.getElementById('languageSelect').value;
    document.getElementById(`locale_${selectedLang}`).style.display = '';

    document.getElementById('languageSelect').addEventListener('change', function() {
        const language = this.value;
        document.querySelectorAll('.localeField').forEach(function(el) {
            el.style.display = 'none';
        });
        document.getElementById(`locale_${language}`).style.display = '';
    });
});
</script>

@endsection

