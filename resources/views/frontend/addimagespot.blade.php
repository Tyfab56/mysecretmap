@extends('frontend.main_master')
@section('css')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/driveway.css')}}" />
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<link rel="stylesheet" href="{{ asset('frontend/assets/css/masonry.css')}}"/>
@endsection
@section('fullscripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="{{ asset('frontend/assets/js/masonry.min.js')}}"></script>
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

function delPicture (id)
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
  $(document).ready(function() {
  // Initialize Masonry
  var $grid = $('.grid').masonry({
    itemSelector: '.grid-item',
    columnWidth: '.grid-item',
    percentPosition: true
  });

  // Layout Masonry after each image loads
  
});

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
          <div class="col-lg-3 bgregbox">
           <p><b>Nombre d'images :</b> {{ $spottotalcount }}</p>
          </div>
          <div class="col-lg-9">
          <div class="grid">
              @foreach ($pictures as $picture)
                <div class="grid-item">
                  <img src="{{ $picture->medium }}" alt="">
                </div>
                <div><a href="javascript:delPicture({{ $picture->id }})"><img class="delete-image" src="{{asset('frontend/assets/images/delete.png')}}"></a></div>
              @endforeach
            </div>
           
          </div>
        </div>

 @else
 Uniquement pour les photographes
 @endif
@endauth
<style>
  .grid-item {
    float: left;
    margin-bottom: 10px;
    width: 25%; /* ajuster la largeur des colonnes en fonction de vos besoins */
  }
  
  .grid-item img {
    display: block;
    max-width: 100%;
    height: auto;
  }
  
  .grid-item .delete-icon {
    position: absolute;
    top: 0;
    right: 0;
    z-index: 1;
    color: #fff;
    background-color: rgba(0, 0, 0, 0.5);
    padding: 5px;
    border-radius: 50%;
    cursor: pointer;
  }
</style>

@endsection