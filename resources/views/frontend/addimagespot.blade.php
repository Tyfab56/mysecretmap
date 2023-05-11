@extends('frontend.main_master')
@section('css')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

@endsection
@section('fincss')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/flexbin.css')}}" />
@endsection

@section('fullscripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

@endsection
@section('scripts')

// Initialisation de Dropzone
Dropzone.options.myDropzone = {
    paramName: "file",
    maxFilesize: 20, // Taille maximale des fichiers en Mo
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
      
            this.on("totaluploadprogress", function(progress) {
                document.querySelector("#progress .progress-bar").style.width = progress + "%";
            });
            this.on("queuecomplete", function() {
                document.querySelector("#progress .progress-bar").style.width = "0%";
            });
    }
};

function deletePicture (id)
            {
            let url = '{{route('delimagespot', ['Id'])}}';
            url = url.replace('Id', id);

            Swal.fire({
            title: 'Confirmer la suppression?',
            text: "Suppression definitive",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimer'
            }).then((result) => {
            if (result.value) {
            window.location.href = url;
            }
            });
            }
  
          
@endsection
@section('content')
@auth
@if (auth()->user()->isPhotographer())
<section id="ts-features" class="ts-features">
    <div class="container">
      <div class="row">
                
      </div>
        <div class="row">
          <div class="col-lg-12"><img  class="w100" src="{{$spot->imgpanolarge??''}}"></div>
        </div>
        <div class="col-12">
        <form action="{{ route('addimagespot.storedz') }}" class="dropzone" id="myDropzone">
              @csrf
              <input type="hidden" id="spotid" name="spotid" value="{{$spot->id}}">
          </form>

          <div id="progress" class="progress">
              <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
          </div>

          <a class="btn btn-secondary mb-5" href="/destination/{{ $spot->pays_id }}/{{ $spot->id }}">RETOUR PAGE PRECEDENTE</a>
          
      
        </div>
        <div class="row">
          <div class="col-lg-2 bgregbox">
           <p><b>Nombre d'images :</b> {{ $spottotalcount }}</p>
          </div>
          <div class="col-lg-10">

     
          <div class="flexbin flexbin-margin">
              
              @foreach($pictures as $photo)
              <div class="picture-wrapper">
                    <a href="product/1.html"><img src="{{ $photo->medium }}" /></a>
                    <img src="/images/delete.png" alt="Supprimer" class="delete-icon" onclick="deletePicture({{ $photo->id }})">
              </div> 
              @endforeach
          </div>
          
          <div class="flexbin flexbin-margin">
    @foreach($pictures as $photo)
        <div class="picture-wrapper">
            <a href="product/1.html"><img src="{{ $photo->medium }}" /></a>
            <img src="{{asset('frontend/assets/images/delete.png')}}" alt="Supprimer" class="delete-icon" onclick="deletePicture({{ $photo->id }})">
        </div>
    @endforeach
</div>

           
          </div>
        </div>

 @else
 Uniquement pour les photographes
 @endif
@endauth
<style>
.picture-wrapper {
    position: relative;
}

.delete-icon {
    position: absolute;
    top: 0;
    right: 0;
    cursor: pointer;
}

</style>

@endsection