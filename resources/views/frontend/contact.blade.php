@extends('frontend.main_master')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h1>Formulaire de contact</h1>
        @if ($errors->has('reCAPTCHA'))
            <div class="alert alert-danger">
                {{ $errors->first('reCAPTCHA') }}
            </div>
       
        @endif
        <form id='contactform' method="POST" action="/contact">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="texte" class="form-label">Texte</label>
                <textarea class="form-control" id="texte" name="texte" required></textarea>
            </div>
            <input type="hidden" name="recaptcha_v3_token" id="recaptcha_v3_token">
            <button type="submit" class="btn btn-primary mb-5 mt-5">Envoyer</button>
        </form>
    </div>
    <div id="spinner" style="display: none;">
            <div class="orbit-spinner">
                    <div class="orbit"></div>
                    <div class="orbit"></div>
                    <div class="orbit"></div>
         </div>
   </div>
</div>
<style>
    #spinner {
    display: none;
    position: fixed; /* Utilisez fixed pour le placer par rapport à la fenêtre du navigateur */
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    /* Ajoutez ici d'autres styles pour votre spinner (taille, couleur, etc.) */
   }
    .orbit-spinner, .orbit-spinner * {
      box-sizing: border-box;
    }

    .orbit-spinner {
      height: 55px;
      width: 55px;
      border-radius: 50%;
      perspective: 800px;
    }

    .orbit-spinner .orbit {
      position: absolute;
      box-sizing: border-box;
      width: 100%;
      height: 100%;
      border-radius: 50%;
    }

    .orbit-spinner .orbit:nth-child(1) {
      left: 0%;
      top: 0%;
      animation: orbit-spinner-orbit-one-animation 1200ms linear infinite;
      border-bottom: 3px solid #ff1d5e;
    }

    .orbit-spinner .orbit:nth-child(2) {
      right: 0%;
      top: 0%;
      animation: orbit-spinner-orbit-two-animation 1200ms linear infinite;
      border-right: 3px solid #ff1d5e;
    }

    .orbit-spinner .orbit:nth-child(3) {
      right: 0%;
      bottom: 0%;
      animation: orbit-spinner-orbit-three-animation 1200ms linear infinite;
      border-top: 3px solid #ff1d5e;
    }

    @keyframes orbit-spinner-orbit-one-animation {
      0% {
        transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
      }
      100% {
        transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
      }
    }

    @keyframes orbit-spinner-orbit-two-animation {
      0% {
        transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
      }
      100% {
        transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
      }
    }

    @keyframes orbit-spinner-orbit-three-animation {
      0% {
        transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
      }
      100% {
        transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
      }
    }
</style>
@endsection
@section('fincss')
<script>
    document.getElementById('contactform').onsubmit = function(){
    document.getElementById('spinner').style.display = 'block';
};
</script>
<script src="https://www.google.com/recaptcha/api.js?render=6LfGlhgoAAAAAIy5hyp6rpWRdOZteIFQ5s9fm0VU"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6LfGlhgoAAAAAIy5hyp6rpWRdOZteIFQ5s9fm0VU', { action: 'contact' }).then(function(token) {
            document.getElementById('recaptcha_v3_token').value = token;
        });
    });
</script>
@endsection