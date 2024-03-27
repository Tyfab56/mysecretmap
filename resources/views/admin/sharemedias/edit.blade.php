@extends('frontend.main_master')

@section('content')
<div class="container">
    <h1>Modifier le Média</h1>

    <form action="{{ route('admin.sharemedias.update', $shareMedia->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- Autres champs du formulaire -->
        
        <div class="form-group">
            <label>Vignette Actuelle</label>
            <br>
            <!-- Afficher la vignette actuelle s'il en existe une -->
            @if($shareMedia->thumbnail_link)
                <img src="{{ $shareMedia->thumbnail_link }}" alt="Vignette" style="max-width: 100px; max-height: 100px;">
            @else
                Pas de vignette disponible.
            @endif
        </div>

        <div class="form-group">
            <label for="thumbnail">Changer la Vignette</label>
            <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
        </div>

        <!-- Autres champs du formulaire -->
        
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
