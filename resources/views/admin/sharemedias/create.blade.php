@extends('frontend.main_master')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.7.0/dist/min/dropzone.min.css" type="text/css" />

@endsection
@section('fullscripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.js"></script>

@endsection

@section('content')
<div class="container">
    <h1>Ajouter un Nouveau Média</h1>
    <a href="{{ route('admin.sharemedias.index') }}" class="btn btn-primary">Retour à la liste</a>

    <form action="{{ route('admin.sharemedias.store') }}" id="MyFormId" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="folder_id">Dossier</label>
            <select class="form-control" name="folder_id" id="folder_id">
                @foreach($folders as $folder)
                    <option value="{{ $folder->id }}" {{ $folder->id == $defaultFolderId ? 'selected' : '' }}>{{ $folder->name }}</option>
                @endforeach
        </select>
        </div>
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $defaultTitle)}}" required>
        </div>
        
        <div class="form-group">
            <label for="media_type">Type de Média</label>
            <select class="form-control" id="media_type" name="media_type">
                <option value="photo" {{ $defaultMediaType == 'photo' ? 'selected' : '' }}>Photo</option>
                <option value="video" {{ $defaultMediaType == 'video' ? 'selected' : '' }}>Vidéo</option>
                <option value="film" {{ $defaultMediaType == 'film' ? 'selected' : '' }}>Film</option>
            </select>

        </div>
        <div class="dropzone" id="mediaDropzone"></div>
        <div id="progress" class="progress">
              <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        <div class="form-group">
            <label for="credits">Crédits</label>
            <input type="number" class="form-control" id="credits" name="credits" value="1">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>

       

    </form>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
Dropzone.options.mediaDropzone = {
    url: "{{ route('admin.sharemedias.store') }}",
    uploadMultiple: false, // Changez cela pour forcer le traitement des fichiers individuellement
    parallelUploads: 1,
    maxFiles: 100,
    timeout:0,
    paramName: "media", // Ce sera utilisé pour nommer l'input des fichiers
    acceptedFiles: 'image/*,video/*',
    addRemoveLinks: true,
    init: function() {
        var myDropzone = this;
    
        this.on("sending", function(file, xhr, formData) {
                // Ajouter le token CSRF dans les headers est correct
                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

                // Assurez-vous d'ajouter également les autres données de formulaire
                formData.append('folder_id', document.getElementById('folder_id').value);
                formData.append('title', document.getElementById('title').value);
                formData.append('media_type', document.getElementById('media_type').value);
                formData.append('credits', document.getElementById('credits').value);
            });
        this.on("totaluploadprogress", function(progress) {
                document.querySelector("#progress .progress-bar").style.width = progress + "%";
            });
        this.on("queuecomplete", function() {
                document.querySelector("#progress .progress-bar").style.width = "0%";
            });

            this.on("success", function(file, response) {
                // Ici, vous pourriez traiter la réponse du serveur
                console.log("Réponse du serveur :", response);
               
            });

    }
};
});

</script>

@endsection
