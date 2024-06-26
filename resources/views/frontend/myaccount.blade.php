@extends('frontend.main_master')
@section('css')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection
@section('scripts')

// Initialisation de Dropzone
Dropzone.options.myDropzone = {
    thumbnailWidth: 400,
    thumbnailHeight: 133,
    paramName: "file",
    maxFilesize: 2, 
    acceptedFiles: ".jpeg,.jpg", 
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
        var dzInstance = this; 

        @if(!empty($user->large_banner))
        var mockFile = {
            name: "Image existante",
            size: 12345, 
            type: 'image/jpeg',
            status: Dropzone.ADDED,
            url: '{{ $user->large_banner }}'
        };

        this.files.push(mockFile);
        this.emit("addedfile", mockFile);
        this.emit("thumbnail", mockFile, '{{ $user->large_banner }}');
        @endif

        this.on("success", function(file, response) {
            this.files.forEach(function(fileItem) {
                if (fileItem !== file) {
                    dzInstance.removeFile(fileItem);
                }
            });

            
        });

        this.on("error", function(file, response) {
            if(response.status === 'error') {
                console.log(response.message); 
            }
        });
      
            this.on("totaluploadprogress", function(progress) {
                document.querySelector("#progressbar .progress-bar").style.width = progress + "%";
            });
            this.on("queuecomplete", function() {
                document.querySelector("#progressbar .progress-bar").style.width = "0%";
            });
    }
};
@endsection

@section('fullscripts')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<script>
$(document).ready(function() {
    var hash = window.location.hash;
    if(hash) {
        $(hash).collapse('show');
    }
});

function submitForm() {
    document.getElementById('whoiamForm').submit();
}



$('#save-info-button').click(function() {
        $.ajax({
            type: 'POST',
            url: $('#update-info-photo').attr('action'),
            data: $('#update-info-photo').serialize(),
            success: function(response) {
                // Gérez la réponse de la requête ici (par exemple, affichez un message de succès)
                alert('Data updated successfully!');
            },
            error: function(error) {
                // Gérez les erreurs de la requête ici
                console.error(error);
            }
        });
    });

   
</script>

@endsection

@section('content')
@auth
<section id="main-container" class="main-container">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">      
               <div class="row">
                    <h3 class="border-title border-left mar-t0">{{ __('compte.MonCompte') }}</h3>
                    <div class="accordion accordion-group accordion-classic" id="construction-accordion">
                                <div class="card">
                                    <div class="card-header p-0 bg-transparent" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                {{ __('compte.MesInfos') }}
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#construction-accordion">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3 center-flex">
                                                    <div class="">
                                                        @if($user->profile_photo_path)
                                                        <img id="avatar-preview" class="mw-150 avatar-r100" src="{{ $user->profile_photo_path }}" alt="Avatar" />
                                                        @else
                                                        <img id="avatar-preview" class="mw-150 avatar-r100" src="{{asset('frontend/assets/images/avatar.jpg')}}" alt="Avatar" />
                                                        @endif
                                                    </div>
                                                    <a href="{{route('changeavatar')}}">
                                                        <button class="btn btn-primary mb-1" style="background-color: #ffb600; color: white; border-radius: 5px; font-size: 12px;">{{ __('compte.ChangeAvatar') }}</button>
                                                    </a>
                                                </div>
                                                <div class="col-md-9">
                                                    @if(session('successUser'))
                                                    <div class="alert alert-success">
                                                        {{ session('successUser') }}
                                                    </div>
                                                    @endif
                                                    <form action="{{ route('user.update', $user->id) }}" method="POST" class="user-update-form">
                                                        @csrf
                                                        @method('PUT')
                                                        <p><b>{{ __('compte.Email') }} : </b> {{$user->email}}</p>
                                                        <div class="input-w">
                                                            <label for="name"><p><b>{{ __('compte.Name') }} :</b></p></label>
                                                            <input type="text" name="name" id="name" value="{{$user->name}}" />
                                                        </div>
                                                        @error('name')
                                                        <div class="text-right text-danger">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                        <div class="input-w">
                                                            <label for="prenom"><p><b>{{ __('compte.Prenom') }} :</b></p></label>
                                                            <input type="text" name="prenom" id="prenom" value="{{$user->prenom}}" />
                                                        </div>
                                                        @error('prenom')
                                                        <div class="text-right text-danger">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                        <div class="input-w">
                                                            <label for="pseudo"><p><b>{{ __('compte.Pseudo') }} :</b></p></label>
                                                            <input type="text" name="pseudo" id="pseudo" value="{{$user->pseudo}}" />
                                                        </div>
                                                        @error('pseudo')
                                                        <div class="text-right text-danger">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                        <div class="input-w">
                                                            <label for="mypays_id"><p><b>{{ __('compte.Pays') }} :</b></p></label>
                                                            <select name="mypays_id" id="mypays_id">
                                                                @foreach($pays as $pay)
                                                                <option value="{{ $pay->pays_id }}" @if($user->mypays_id == $pay->pays_id) selected @endif>{{ $pay->pays }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('mypays_id')
                                                        <div class="text-right text-danger">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                        <button type="submit" class="cool-btn">{{ __('compte.savechange') }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @if ($user->whoiam_id !== 1)
                                <div class="card">
                                    <div class="card-header p-0 bg-transparent" id="headingThree">
                                            <h2 class="mb-0">
                                                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    {{ __('compte.MesReseaux') }}
                                                </button>
                                            </h2>
                                    </div>
                                                
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#construction-accordion">
                                        <div class="card-body">
                                            @if(session('successSocial'))
                                                <div class="alert alert-success">
                                                    {{ session('successSocial') }}
                                                </div>
                                            @endif
                                        <form action="{{ route('user.updateSocial', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                
                                                <div class="input-w">
                                                    <label for="internet" class="social-label">
                                                        <div class="label-text"><b>{{ __('compte.Web') }} :</b></div>
                                                        <div class="label-icon"><i class="fas fa-globe"></i></div>
                                                        <div class="label-input"><input type="text" name="internet" id="internet" value="{{$user->internet}}" /></div>
                                                    </label>
                                                    @error('internet')
                                                                <div class="text-right text-danger">
                                                                                        {{ $message }}
                                                                </div>
                                                                @enderror
                                                </div>
                                                
                                                <div class="input-w">
                                                    <label for="facebook" class="social-label">
                                                        <div class="label-text"><b>{{ __('compte.Facebook') }} :</b></div> 
                                                        <div class="label-icon"><i class="fab fa-facebook-square"></i></div>
                                                        <div class="label-input"><input type="text" name="facebook" id="facebook" value="{{$user->facebook}}" /></div>
                                                    </label>
                                                    @error('facebook')
                                                                <div class="text-right text-danger">
                                                                                        {{ $message }}
                                                                </div>
                                                                @enderror
                                                </div>
                                                
                                                <div class="input-w">
                                                    <label for="instagram" class="social-label">
                                                        <div class="label-text"><b>{{ __('compte.Instagram') }} :</b></div>
                                                        <div class="label-icon"><i class="fab fa-instagram"></i></div> 
                                                        <div class="label-input"><input type="text" name="instagram" id="instagram" value="{{$user->instagram}}" /></div>
                                                    </label>
                                                    @error('instagram')
                                                                <div class="text-right text-danger">
                                                                                        {{ $message }}
                                                                </div>
                                                                @enderror
                                                </div>

                                                <!-- Twitter -->
                                                <div class="input-w">
                                                    <label for="twitter" class="social-label">
                                                        <div class="label-text"><b>{{ __('compte.Twitter') }} :</b></div>
                                                        <div class="label-icon"><i class="fab fa-twitter"></i></div>
                                                        <div class="label-input"><input type="text" name="twitter" id="twitter" value="{{$user->twitter}}" /></div>
                                                    </label>
                                                    @error('twitter')
                                                                <div class="text-right text-danger">
                                                                                        {{ $message }}
                                                                </div>
                                                    @enderror
                                                </div>

                                                <!-- 500px -->
                                                <div class="input-w">
                                                    <label for="five_hundred_px" class="social-label">
                                                        <div class="label-text"><b>{{ __('compte.500px') }} :</b></div>
                                                        <div class="label-icon"><i class="fab fa-500px"></i></div>
                                                        <div class="label-input"><input type="text" name="five_hundred_px" id="five_hundred_px" value="{{$user->five_hundred_px}}" /></div>
                                                    </label>
                                                                @error('five_hundred_px')
                                                                <div class="text-right text-danger">
                                                                                        {{ $message }}
                                                                </div>
                                                                @enderror
                                                </div>

                                                <!-- TikTok -->
                                                <div class="input-w">
                                                    <label for="tiktok" class="social-label">
                                                        <div class="label-text"><b>{{ __('compte.TikTok') }} :</b></div>
                                                        <div class="label-icon"><i class="fab fa-tiktok"></i></div>
                                                        <div class="label-input"><input type="text" name="tiktok" id="tiktok" value="{{$user->tiktok}}" /></div>
                                                    </label>
                                                                @error('tiktok')
                                                                <div class="text-right text-danger">
                                                                                        {{ $message }}
                                                                </div>
                                                                @enderror
                                                </div>

                                                <!-- Mastodon -->
                                                <div class="input-w">
                                                    <label for="mastodon" class="social-label">
                                                        <div class="label-text"><b>{{ __('compte.Mastodon') }} :</b></div>
                                                        <div class="label-icon"><i class="fab fa-mastodon"></i></div>
                                                        <div class="label-input"><input type="text" name="mastodon" id="mastodon" value="{{$user->mastodon}}" /></div>
                                                    </label>
                                                    @error('mastodon')
                                                                <div class="text-right text-danger">
                                                                                        {{ $message }}
                                                                </div>
                                                                @enderror
                                                </div>

                                                <!-- Save Button -->
                                                <button type="submit" class="cool-btn">{{ __('compte.savechange') }}</button>

                                        </form>

                                        </div>
                                    </div>
                                </div>
                            @endif
                    </div>
                </div>
        </div>
       
       

        <div class="col-lg-6">
            <div class="sidebar sidebar-right">
              <div class="widget">
                        <h3 class="widget-title">Mes Médias</h3>
                        <p>Si vous avez des crédits vous pouvez télécharger ici nos médias</p>
                        <!-- Bouton Mes Médias avec le nombre total -->
                        <a href="{{ route('mes-medias') }}" class="btn btn-primary">
                            Mes médias ({{ $userMediaCount }})
                        </a>
                       
                        
                </div>
                <div class="widget">
                    <div class="container">
                        <h4>Messages Non Lus</h4>
                        @if($unreadMessages->count() > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sujet</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($unreadMessages as $message)
                                <tr class="{{ is_null($message->read_at) ? 'table-warning' : '' }}">
                        <td>
                            <img src="{{ $message->sender->avatar ?? asset('path/to/default/avatar.jpg') }}" alt="avatar" style="width: 30px; height: 30px; border-radius: 50%;">
                            {{ Str::limit($message->body, 200) }}
                        </td>
                        <td>{{ $message->sender->pseudo ?? 'Administrateur' }}</td>
                        <td>{{ $message->formatted_created_at}}</td>
                        <td>
                            <a href="{{ route('messages.show', $message->id) }}" class="btn btn-sm btn-info">Voir</a>
                            
                        </td>
                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <p>Vous n'avez aucun message non lu.</p>
                        @endif
                        <a href="{{ route('messages.index') }}" class="btn btn-primary btn-sm">Voir ltous les messages</a>
                </div>  <!-- Container -->
                        
                </div><!-- Widget -->

                <div class="widget recent-posts">
                    <h3 class="widget-title">Bienvenue sur My Secret Map</h3>
                    <p>Cette page vous permet de modifier vos informations, le niveaux de vos abonnements et de saisir les paramètres de vos circuits.</p>
                    <p><b>Rejoindre le club : </b>Si vous souhaitez <a href="https://www.patreon.com/fabriceh" target="_blank">rejoindre le club des voyageurs</a>, vous trouverez sur cet lien toutes les informations utiles.</p>
                </div>
            </div>
        </div>
      </div>
    </div>
</section>

<style>

.radio-box {
    border: 1px solid #e0e0e0;  /* bordure grise */
    padding: 20px;              /* espace intérieur */
    border-radius: 10px;        /* coins arrondis */
    background-color: #f9f9f9; /* couleur de fond légèrement grise */
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1); /* ombre subtile */
    margin: 20px 0;            /* espace extérieur, à ajuster selon les besoins */
}

    .center-flex {
    display: flex;
    align-items: center;
    flex-direction: column; /* pour garder les éléments en colonne */
}


  .user-update-form .input-w {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.user-update-form .input-w label {
    flex: 1;
    margin-right: 10px;
}

.user-update-form .input-w input, 
.user-update-form .input-w select {
    flex: 2;
    padding: 10px;
    height: 40px;
    box-sizing: border-box;
    width: 100%;  /* Pour s'assurer qu'il prend toute la largeur disponible */
    border: 1px solid #ccc;  /* Si vous avez une bordure sur vos inputs, assurez-vous qu'elle est aussi sur votre select */
    border-radius: 4px;  /* Si vous utilisez des coins arrondis pour vos inputs */
    font-size: 1rem;  /* Assurez-vous que la taille de la police est la même */
}


.label-text, .label-icon, .label-input {
    display: flex;
    align-items: center; 
}

.label-text {
    justify-content: flex-end; /* Aligner le texte à droite */
    padding-right: 10px; /* Pour un peu d'espace avant l'icône */
}

.label-input input {
    width: 100%; /* Faire en sorte que l'input occupe toute la largeur de son conteneur */
}



button[type="submit"]:hover {
    background-color: #000000;
}



.hint-content {
    transition: opacity 0.3s ease-in-out, max-height 0.3s ease-in-out;
    opacity: 0;
    max-height: 0;
    overflow: hidden;
    font-size: 0.9rem; /* réduit la taille de la police */
    border-radius: 10px; /* coins arrondis */
    padding: 10px; /* espace autour du texte à l'intérieur de la boîte */
    background-color: #f7f7f7; /* couleur de fond légèrement grise */
}

.hint-toggle {
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
    font-size: 14px;
    color: #007bff; /* ou une autre couleur de votre choix */
    transition: transform 0.3s;
}

.hint-visible .hint-toggle {
    transform: rotate(180deg); /* Pour tourner l'icône quand le contenu est visible */
}

.hint-visible .hint-content {
    opacity: 1;
    max-height: 200px; /* ajustez cette valeur selon la hauteur maximale que vous souhaitez pour le contenu */
}
.dropzone .dz-preview.dz-image-preview {

    margin-left: auto;
    margin-right: auto;
    display: block;
}

.dropzone .dz-preview .dz-image {
    width: 100%;
    height: 100%;
}
.dropzone .dz-preview .dz-image img {
    width: 100%;    /* pour que l'image prenne toute la largeur de son conteneur */
    height: auto;   /* pour maintenir le ratio d'aspect */
    max-width: 400px;   /* ou la valeur que vous souhaitez */
    margin-bottom: 0;
    object-fit: cover;
}

.dropzone .dz-preview {
    width: 400px;  /* ou la valeur que vous souhaitez */
}

.dropzone .dz-preview .dz-progress {
    display: none;
}
</style>

@endauth
@guest
vous devez être connecté
@endguest
@endsection