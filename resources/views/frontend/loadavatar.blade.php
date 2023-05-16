@extends('frontend.main_master')
@section('css')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection
@section('fullscripts')

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

@endsection
@section('scripts')


Dropzone.options.myDropzone = {
    paramName: "file",
    maxFilesize: 2, // Taille maximale des fichiers en Mo
    acceptedFiles: ".jpeg,.jpg,.png,.gif", // Extensions autorisées
    dictDefaultMessage: "Glissez-déposez vos fichiers ici ou cliquez pour sélectionner",
    dictFallbackMessage: "Votre navigateur ne supporte pas le glisser-déposer de fichiers.",
    dictFileTooBig: "Le fichier est trop volumineux. Taille maximale autorisée : 20Mo.",
    dictInvalidFileType: "Vous ne pouvez pas téléverser des fichiers de ce type.",
    dictResponseError: "Le serveur a répondu avec une erreur.",
    dictCancelUpload: "Annuler l'envoi",
    dictCancelUploadConfirmation: "Êtes-vous sûr de vouloir annuler cet envoi ?",
    dictRemoveFile: "Supprimer le fichier",
    dictRemoveFileConfirmation: null,
    init: function() {
        this.on("addedfile", function(file) {
            if (file.width < 400 || file.height < 400) {
                this.removeFile(file);
                alert("L'image doit avoir une taille minimale de 400x400 pixels.");
            }
        });
        this.on("success", function(file, response) {
            // Redirect to the desired page
            window.location.href = "{{ route('myaccount') }}";
        });
    }
    
};
@endsection


@section('content')
<div class="row jc-center mt-5">
             <h2 class="center"> Changer votre avatar</h2>

               
</div>       
<div class="row jc-center mt-2"> 
<form action="{{ route('addavatar.store') }}" class="dropzone" id="myDropzone">
              @csrf
              
          </form>
        
</div>    
<div class="row jc-center mt-2">
<a href="{{route('myaccount')}}"><button class="btn btn-primary mb-1" style="background-color: #ffb600; color: white; border-radius: 5px;">{{ __('index.RetourPrecPage') }}</button></a>
</div> 
@endsection