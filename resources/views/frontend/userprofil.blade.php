@extends('layouts.app')  {{-- Assume you have a main layout --}}

@section('content')
<div class="user-banner" style="background-image: url('{{ $user->banner_path }}');">
    <h1 class="user-pseudo">{{ $user->pseudo }}</h1>
    <div class="avatar-wrapper">
        <img src="{{ $user->profile_photo_path }}" alt="{{ $user->pseudo }}'s avatar" class="user-avatar"/>
    </div>
</div>

<<div class="social-icons">
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
    height: 250px; 
    background-size: cover;
    background-position: center;
    position: relative;
    text-align: center;
    color: white;
    padding-top: 100px;
}

.user-pseudo {
    font-size: 2em;
}

.avatar-wrapper {
    position: absolute;
    bottom: -25px;
    left: 50%;
    transform: translateX(-50%);
    border: 3px solid white;
    border-radius: 50%;
    overflow: hidden;
}

.user-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
}

.social-icons {
    text-align: center;
    margin-top: 30px;
}

.social-icons a {
    margin: 0 10px;
    font-size: 24px;
}

.user-description {
    margin-top: 30px;
    text-align: justify;
    padding: 0 10%;
}
</style>
@endsection
