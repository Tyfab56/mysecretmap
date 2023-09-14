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

        
                <div class="gallery-container" > 
                    <h2 class="heading-text">Responsive <span>image gallery</span></h2>
                    <!-- header text --> 
                    
                    <ul class = "image-gallery" > 
                    @foreach($pictures as $photo)

                    <<li>
                        <img src="{{ $photo->medium }}" class="mainimg" alt="Image Title" /> 
                        <div class="overlay">
                            <span>Titre de l'image</span>
                            <a href="/delimagespot/{{ $photo->id }}" class="delete-photo" onclick="return confirm('Are you sure you want to delete this image?');">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </li>

                    
                    @endforeach
                    </ul> 
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

.gallery-container {
  padding: 40px 5%;
}

.heading-text {
  margin-bottom: 2rem;
  font-size: 2rem;
}

.heading-text span {
  font-weight: 100;
}

ul {
  list-style: none;
}

/* Responsive image gallery rules begin*/

.image-gallery {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
}

.image-gallery > li {
  flex: 1 1 auto; /* or flex: auto; */
  height: 300px;
  cursor: pointer;
  position: relative;
}

.image-gallery::after {
  content: "";
  flex-grow: 999;
}

.image-gallery li .mainimg {
  object-fit: cover;
  width: 100%;
  height: 100%;
  vertical-align: middle;
  border-radius: 5px;
}

.overlay {
  position: absolute;
  width: 100%;
  height: 100%;
  background: rgba(57, 57, 57, 0.502);
  top: 0;
  left: 0;
  transform: scale(0);
  transition: all 0.2s 0.1s ease-in-out;
  color: #fff;
  border-radius: 5px;
  /* center overlay content */
  display: flex;
  align-items: center;
  justify-content: center;
}

/* hover */
.image-gallery li:hover .overlay {
  transform: scale(1);
}


</style>

@endsection