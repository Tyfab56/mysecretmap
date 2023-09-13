@extends('frontend.main_master')

@section('css')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/GridOverflow3D.css')}}" />
@endsection

@section('content')
<div class="gridOverflow go-masonry go-zoomFx go-actionIcon">

@foreach ($pictures as $picture)
    <div class="go_gridItem">
        <div class="image-container">
            <a href="{{ $picture->medium }}">
                <img src="{{ $picture->medium }}" alt="Image principale">
            </a>
            <div class="avatar-overlay">
                <img class="avatar" src="{{ $picture->user->profile_photo_path }}" alt="Avatar">
            </div>
        </div>
    </div>
    @endforeach
  <div class="go_gridItem go_gridItem-centered" href="someURL"><p> centered content - typically some text </p> </div>
 
</div>
<div class="row">{{ $pictures->links() }}</div>
<style>
  .gridOverflow {
    max-width: 90%;
    margin-top: 10px;
    margin-bottom: 10px;
    --masonryItemHeight: 180px;
  }
  .avatar-overlay {
    position: relative;
    width: 50px;
    height: 50px;
    overflow: hidden;
    border-radius: 50%; /* Rend l'avatar rond */
    background-color: rgba(0, 0, 0, 0.8); /* Fond semi-transparent */
    display: none; /* Masque initialement l'avatar */
    margin-top: -50px; /* Déplace l'avatar au-dessus de l'image principale */
    margin-left: 10px; /* Ajustez la position horizontale selon vos besoins */
    z-index: 1; /* Assurez-vous que l'avatar est au-dessus de l'image principale */
}

.avatar {
    width: 100%;
    height: auto;
}

/* Afficher l'avatar au survol */
.image-container:hover .avatar-overlay {
    display: block;
  </style>
@endsection