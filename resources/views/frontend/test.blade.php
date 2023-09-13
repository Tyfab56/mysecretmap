@extends('frontend.main_master')

@section('css')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/GridOverflow3D.css')}}" />
@endsection

@section('content')
<div class="gridOverflow go-masonry">
    @foreach ($pictures as $picture)
    <div class="go_gridItem">
        <div class="image-container">
            <img src="{{ $picture->medium }}" alt="Image principale">
            <div class="avatar-overlay">
                <img class="avatar" src="{{ $picture->user->profile_photo_path }}" alt="Avatar">
            </div>
        </div>
    </div>
    @endforeach
    <div class="go_gridItem go_gridItem-centered" href="someURL">
        <p>centered content - typically some text</p>
    </div>
</div>
<div class="row">{{ $pictures->links() }}</div>

<style>
  .gridOverflow {
    max-width: 90%;
    margin-top: 10px;
    margin-bottom: 10px;
    --masonryItemHeight: 180px;
  }

  /* Style pour l'avatar */
.image-container {
    position: relative;
}

.avatar-overlay {
    position: absolute;
    width: 50px;
    height: 50px;
    overflow: hidden;
    border-radius: 50%; /* Rend l'avatar rond */
    background-color: rgba(0, 0, 0, 0.8); /* Fond semi-transparent */
    display: none; /* Masque initialement l'avatar */
    bottom: 0; /* Positionne l'avatar en bas */
    right: 0; /* Positionne l'avatar à droite */
    z-index: 1; /* Assurez-vous que l'avatar est au-dessus de l'image principale */
}

.avatar {
    width: 100%;
    height: auto;
}

/* Afficher l'avatar au survol de l'image */
.image-container:hover .avatar-overlay {
    display: block;
}

  </style>
@endsection