@extends('frontend.main_master')
@section('css')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/driveway.css')}}" />
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

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
          @foreach($pictures as $photo)
          <div class="masonry masonry--h">
             <figure class="masonry-brick masonry-brick--h"><img src="{{ $photo->medium }}" class="masonry-img" alt=""></figure>
          </div>
          @endforeach
          

           
          </div>
        </div>

 @else
 Uniquement pour les photographes
 @endif
@endauth
<style>.wrapper {
  margin: 2em auto;
  max-width: 970px;
}

img {
  vertical-align: middle;
  max-width: 100%;
}

.masonry {
  display: flex;
  width: 100%;
}

a {
  color: #333;
}

.masonry--h {
  flex-flow: row wrap;
}

.masonry--v {
  flex-flow: column wrap;
  max-height: 1080px;
}

.masonry--h,
.masonry--v {
  margin-left: -8px; /* Adjustment for the gutter */
  counter-reset: brick;
}

.masonry-brick {
  overflow: hidden;
  border-radius: 5px;
  margin: 0 0 8px 8px;  /* Some Gutter */
  background-color: #333;
  color: white;
  position: relative;
}

.masonry-brick:after {
  position: absolute;
  top: 50%;
  left: 50%;
  z-index: 5000;
  transform: translate(-50%, -50%);
  counter-increment: brick;
  content: counter(brick);
  transition: font-size .25s, opacity .25s ease-in-out;
  font-weight: 700;
  opacity: .5;
  font-size: 1.25em;
}

.masonry-brick:hover:after {
  font-size: 2.25em;
  opacity: 1;
}

.masonry-brick--h {
  flex: auto;
  height: 250px;
  min-width: 150px;
}

@media only screen and (min-width: 1024px) {
  /* Horizontal masonry bricks on desktop-sized screen */
  .masonry-brick--h:nth-child(4n+1) {
    width: 250px;
  }
  .masonry-brick--h:nth-child(4n+2) {
    width: 325px;
  }
  .masonry-brick--h:nth-child(4n+3) {
    width: 180px;
  }
  .masonry-brick--h:nth-child(4n+4) {
    width: 380px;
  }

  /* Adjusting vertical masonry height on desktop-sized screen */
  .masonry--v {
    max-height: 1600px;
  }

  /* Vertical masonry bricks on desktop-sized screen */
  .masonry-brick--v {
    width: 33.33333%;
  }
}

@media only screen and (max-width: 1023px) and (min-width: 768px) {
  /* Horizontal masonry bricks on tabled-sized screen */
  .masonry-brick--h:nth-child(4n+1) {
    width: 200px;
  }
  .masonry-brick--h:nth-child(4n+2) {
    width: 250px;
  }
  .masonry-brick--h:nth-child(4n+3) {
    width: 120px;
  }
  .masonry-brick--h:nth-child(4n+4) {
    width: 280px;
  }

  /* Adjusting vertical masonry height on tablet-sized screen */
  .masonry--v {
    max-height: 2000px;
  }

  /* Vertical masonry bricks on tablet-sized screen */
  .masonry-brick--v {
    width: 50%;
  }
}

.masonry-img {
  object-fit: cover;
  width: 100%;
  height: 100%;
  filter: brightness(50%);
}

</style>

@endsection