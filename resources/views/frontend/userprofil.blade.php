@extends('frontend.main_master')
@section('css')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/GridOverflow3D.css')}}" />
@endsection
@section('content')
<div class="user-banner">
    <h1 class="user-pseudo">{{ $user->pseudo }}</h1>
    <img src="{{ $user->large_banner }}" alt="User Banner" class="user-large-banner"/>
    <div class="avatar-wrapper">
        <img src="{{ $user->profile_photo_path }}" alt="{{ $user->pseudo }}'s avatar" class="user-avatar"/>
    </div>
</div>
<h2 class="user-title">{{ $user->title }}</h2>
<p class="user-description">{{ $user->description }}</p>

<div class="gridOverflow go-masonry">

    @foreach ($pictures as $picture)
    <a href="/destination/{{$picture->spot->pays_id}}/{{$picture->spot->id}}" class="go_gridItem">

         <img src="{{ $picture->medium }}" /> 
         <span class="go_caption go_caption-full">
                {{ $picture->spot->name }}
                
         </span>
    </a>
    @endforeach

    <div class="go_gridItem go_gridItem-centered" href="someURL">
        <p> centered content - typically some text </p> 
    </div>
</div>
<div class="row">{{ $pictures->links() }}</div>
<div class="social-icons">
    @if($user->internet)
        <a href="{{ $user->internet }}" target="_blank" title="Website"><i class="fas fa-globe"></i></a>
    @endif

    @if($user->facebook)
        <a href="{{ $user->facebook }}" target="_blank" title="Facebook"><i class="fab fa-facebook-square"></i></a>
    @endif
    
    @if($user->instagram)
        <a href="{{ $user->instagram }}" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
    @endif

    @if($user->twitter)
        <a href="{{ $user->twitter }}" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
    @endif

    @if($user->five_hundred_px)
        <a href="{{ $user->five_hundred_px }}" target="_blank" title="500px"><i class="fab fa-500px"></i></a>
    @endif

    @if($user->tiktok)
        <a href="{{ $user->tiktok }}" target="_blank" title="TikTok"><i class="fab fa-tiktok"></i></a>
    @endif

    @if($user->mastodon)
        <a href="{{ $user->mastodon }}" target="_blank" title="Mastodon"><i class="fab fa-mastodon"></i></a>
    @endif
</div>


<style>
   .user-banner {
    position: relative;
    text-align: center;
    color: white;
}

.user-pseudo {
    font-size: 2.5em;
    z-index: 2;
    position: relative;
}

.user-large-banner {
    width: 100%;
    display: block;
    z-index: 1;
}

.avatar-wrapper {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    border: 3px solid white;
    border-radius: 50%;
    overflow: hidden;
    z-index: 3;
}

.user-avatar {
    width: 100px;  /* Rendu plus grand */
    height: 100px;
    border-radius: 50%;
}

.social-icons {
    text-align: center;
    margin-top: 20px;
}

.social-icons a {
    margin: 0 10px;
    font-size: 24px;
}

.user-title {
    font-size: 1.5em;
    text-align: center;
    margin-top: 20px;
}

.user-description {
    margin-top: 15px;
    text-align: justify;
    padding: 0 10%;
}


</style>
@endsection
