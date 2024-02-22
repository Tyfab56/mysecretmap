@extends('frontend.main_master')
@section('content')
<h2>Ajouter une nouvelle randonnée</h2>

{{-- Formulaire pour les champs de la table principale --}}
<form action="{{ route('admin.randos.store') }}" method="post">
    @csrf

    <div class="form-group">
        <label for="spot_id">Spot ID :</label>
        <input type="text" name="spot_id" id="spot_id" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="pays_id">Pays ID :</label>
        <input type="text" name="pays_id" id="pays_id" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="rang">Rang :</label>
        <input type="text" name="rang" id="rang" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="video_link">Lien Vidéo :</label>
        <input type="text" name="video_link" id="video_link" class="form-control">
    </div>

    <button type="button" class="btn btn-secondary" onclick="toggleTranslationForm()">Ajouter des Traductions</button>

    {{-- Ne soumettez pas encore le formulaire, car les traductions nécessitent une sélection de langue --}}
</form>

{{-- Formulaire pour les traductions --}}
<div id="translationForm" style="display:none;">
    <h3>Traductions</h3>

    <form action="{{ route('admin.randos.storeTranslations') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="language">Sélectionnez la langue :</label>
            <select name="language" id="language" class="form-control">
                <option value="fr">Français</option>
                <option value="en">Anglais</option>
                {{-- Ajoutez d'autres options de langue ici --}}
            </select>
        </div>

        <div class="form-group">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" id="titre" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" id="description" rows="5" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer les Traductions</button>
    </form>
</div>

<script>
    function toggleTranslationForm() {
        var x = document.getElementById("translationForm");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>


@endsection



