@extends('frontend.main_master')
@section('css')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
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

$(function () {
    $('.hint-toggle').click(function(e) {
        e.preventDefault(); 

        var targetId = $(this).data('target');
        var targetElement = $(targetId);
        
        if(targetElement.css('opacity') == '0') {
            targetElement.css({
                'opacity': '1',
                'max-height': '200px' // ou toute autre valeur maximale pour afficher le contenu
            });
            $(this).parent().addClass('hint-visible');
        } else {
            targetElement.css({
                'opacity': '0',
                'max-height': '0'
            });
            $(this).parent().removeClass('hint-visible');
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
                <form id="whoiamForm" action="{{ route('whoiam.update') }}" method="POST" class="mt-3">
                        @csrf
                        @method('PUT')

                        <h2>Choix du profil</h2>
                        <h5 >Le profil permet de paramètrer l'affichage de certaines zones en fonction de votre intérêt</h5>

                        @foreach($whoiams as $whoiam)
                                <div class="form-check ml-5">
                                    <input class="form-check-input" type="radio" name="whoiam_id" id="whoiam_{{ $whoiam->id }}" value="{{ $whoiam->id }}" {{ $user->whoiam_id == $whoiam->id ? 'checked' : '' }} onchange="this.form.submit()">
                                    <label class="form-check-label" for="whoiam_{{ $whoiam->id }}">
                                        {{ $whoiam->name }}
                                        <button class="hint-toggle ml-2" type="button" data-target="#hint_{{ $whoiam->id }}">
                                            ▼
                                        </button>
                                    </label>
                                    <div id="hint_{{ $whoiam->id }}" class="hint-content">
                                        {{ $whoiam->description }}
                                    </div>
                                </div>
                        @endforeach




                </form>
          </div>
        </div>
  
      <div class="row">
        <div class="col-lg-6">
          <h3 class="border-title border-left mar-t0">{{ __('compte.MonCompte') }}</h3>
  
          <div class="accordion accordion-group accordion-classic" id="construction-accordion">
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    {{ __('compte.MesInfos') }}
                  </button>
                </h2>
              </div>
  
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#construction-accordion">
    <div class="card-body">
        <div class="avatar-150">
            @if($user->profile_photo_path)
            <img id="avatar-preview" class="mw-150" src="{{ $user->profile_photo_path }}" alt="Avatar" />
            @else
            <img id="avatar-preview" class="mw-150" src="{{asset('frontend/assets/images/avatar.jpg')}}" alt="Avatar" />
            @endif
        </div>
        <a href="{{route('changeavatar')}}">
            <button class="btn btn-primary mb-1" style="background-color: #ffb600; color: white; border-radius: 5px;">{{ __('compte.ChangeAvatar') }}</button>
        </a>

        <!-- Start of form -->
          @if(session('successUser'))
              <div class="alert alert-success">
                  {{ session('successUser') }}
              </div>
          @endif
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-w">
                <label for="name"><p><b>{{ __('compte.Name') }} :</b></p> </label>
                <input type="text" name="name" id="name" value="{{$user->name}}" readonly style="width:70%" />
                <button type="button" onclick="toggleEdit('name')">Edit</button>
            </div>
            <div class="input-w">
                <label for="prenom"><p><b>{{ __('compte.Prenom') }} :</b></p> </label>
                <input type="text" name="prenom" id="prenom" value="{{$user->prenom}}" readonly style="width:70%" />
                <button type="button" onclick="toggleEdit('prenom')">Edit</button>
            </div>
            <div class="input-w">
                <label for="pseudo"><p><b>{{ __('compte.Pseudo') }} :</b></p> </label>
                <input type="text" name="pseudo" id="pseudo" value="{{$user->pseudo}}" readonly />
                <button type="button" onclick="toggleEdit('pseudo')">Edit</button>
            </div>

            <p><b>{{ __('compte.Email') }} : </b> {{$user->email}}</p>

            <!-- Save Button -->
            <button type="submit" style="display: none;" id="saveChangesBtn">Save Changes</button>
        </form>
    </div>
</div>

<script>


    function toggleEdit(id) {
        let input = document.getElementById(id);
        if (input.readOnly) {
            input.readOnly = false;
            input.focus();
            document.getElementById('saveChangesBtn').style.display = 'block';
        } else {
            input.readOnly = true;
        }
    }
</script>

            </div>
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    {{ __('compte.MesReseaux') }}
                  </button>
                </h2>
              </div>
              @if ($user->whoiam !== 1)
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#construction-accordion">
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
@endif
            </div>
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    {{ __('compte.MesCircuits') }}
                  </button>
                </h2>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                data-parent="#construction-accordion">
                <div class="card-body">
                  Vous pouvez gerez vos circuits ici en choisissant vos destinations. Les membres abonnés au club Patreon disposent de 5 circuits par destination.
                  <select class="form-control mb5" id="idpays" name="idpays" onChange="this.form.submit()">
                        <option value="">{{__('destination.SelectDest')}}</option>
                    
                        @foreach($payslist as $pay)
                        <option value="{{$pay->pays_id}}">{{$pay->pays}}</option>
                        @endforeach
                    </select>
                  <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">The current link item</a>
                            <a href="#" class="list-group-item list-group-item-action">A second link item</a>
                            <a href="#" class="list-group-item list-group-item-action">A third link item</a>
                            <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                            <a href="#" class="list-group-item list-group-item-action ">A disabled link item</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--/ Accordion end -->
        </div>


        <div class="col-lg-6">

            <div class="sidebar sidebar-right">
              <div class="widget recent-posts">
                <h3 class="widget-title">Bienvenue sur My Secret Map</h3>
                <p>Cette page vous permet de modifier vos informations, le niveaux de vos abonnements et de saisir les paramètres de vos circuits.</p>
                <p><b>Rejoindre le club : </b>Si vous souhaitez <a href="https://www.patreon.com/fabriceh" target="_blank" >rejoindre le club des voyageurs</a>, vous trouverez sur cet lien toutes les informations utiles.</p>
              </div><!-- Recent post end -->
            </div><!-- Sidebar end -->
    
          </div><!-- Col end -->
      </div>
    </div>
</section>
<style>
  .fab.fa-facebook-square {
    color: #1877F2; 
    font-size : 25px;
    margin-left: 10px;
    margin-right: 10px;
}
.fab.fa-instagram {
    background: linear-gradient(45deg, #405DE6, #5851DB, #833AB4, #C13584, #E1306C, #FD1D1D);
    color: transparent; /* Pour que la couleur de l'icône elle-même soit transparente et laisse transparaître le dégradé */
    background-clip: text;
    -webkit-background-clip: text;
    font-size : 25px;
    margin-left: 10px;
    margin-right: 10px;
}
.fab.fa-500px {
    color: #0099E5; /* Couleur associée à 500px */
    font-size : 25px;
    margin-left: 10px;
    margin-right: 10px;
}
.fab.fa-twitter {
    color: #1DA1F2; /* Couleur officielle de Twitter */
    font-size : 25px;
    margin-left: 10px;
    margin-right: 10px;
}
.fab.fa-tiktok {
    color: #69C9D0; /* Un bleu associé à TikTok */
    font-size : 25px;
    margin-left: 10px;
    margin-right: 10px;
}
.fab.fa-mastodon {
    color: #3088d4; /* Couleur bleu foncé de Mastodon */
    font-size : 25px;
    margin-left: 10px;
    margin-right: 10px;
}

.fas.fa-globe
{
  font-size : 25px;
    margin-left: 10px;
    margin-right: 10px;
}
.social-label {
    display: grid;
    grid-template-columns: 160px 32px 1fr; /* texte, icône, input */
    align-items: center; /* Centre vertical */
    gap: 10px; /* Espacement entre les éléments */
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

button[type="submit"] {
    background-color: #007bff;
    color: white;
    padding: 5px 15px;  /* Réduire le padding pour réduire la taille du bouton */
    font-size: 14px;  /* Taille du texte plus petite */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    float: right;
    margin-top: 10px;
    margin-bottom: 10px;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #0056b3;
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




</style>

@endauth
@guest
vous devez être connecté
@endguest
@endsection