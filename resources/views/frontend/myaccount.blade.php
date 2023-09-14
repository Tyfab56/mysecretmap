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
</script>
@endsection

@section('content')
@auth
<section id="main-container" class="main-container">
    <div class="container">
  
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
                <label for="internet"><p><b>{{ __('compte.Web') }} :</b></p> </label>
                <input class="w400p" type="text" name="internet" id="internet" value="{{$user->internet}}" />
            </div>
            <div class="input-w">
                <label for="facebook"><p><b>{{ __('compte.Facebook') }} :</b></p> </label>
                <input class="w400p" type="text" name="facebook" id="facebook" value="{{$user->facebook}}" />
            </div>
            <div class="input-w">
                <label for="instagram"> <i class="fab fa-instagram"></i><p><b>{{ __('compte.Instagram') }} :</b></p> </label>
                <input class="w400p" type="text" name="instagram" id="instagram" value="{{$user->instagram}}" />
            </div>

            <!-- Twitter -->
              <div class="input-w">
                  <label for="twitter"><p><b>{{ __('compte.Twitter') }} :</b></p> </label>
                  <input class="w400p" type="text" name="twitter" id="twitter" value="{{$user->twitter}}" />
              </div>

              <!-- 500px -->
              <div class="input-w">
                  <label for="five_hundred_px"><p><b>{{ __('compte.500px') }} :</b></p> </label>
                  <input class="w400p" type="text" name="five_hundred_px" id="five_hundred_px" value="{{$user->five_hundred_px}}" />
              </div>

              <!-- TikTok -->
              <div class="input-w">
                  <label for="tiktok"><p><b>{{ __('compte.TikTok') }} :</b></p> </label>
                  <input class="w400p" type="text" name="tiktok" id="tiktok" value="{{$user->tiktok}}" />
              </div>

              <!-- Mastodon -->
              <div class="input-w">
                  <label for="mastodon"><p><b>{{ __('compte.Mastodon') }} :</b></p> </label>
                  <input class="w400p" type="text" name="mastodon" id="mastodon" value="{{$user->mastodon}}" />
              </div>


            <!-- Save Button -->
            <button type="submit">Save Changes</button>
        </form>
    </div>
</div>

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


@endauth
@guest
vous devez être connecté
@endguest
@endsection