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
  .avatar-container {
        position: absolute;
        bottom: 0;
        left: 0;
        padding: 10px; /* Ajustez la marge si nécessaire */
    }

    /* Style pour l'image de l'avatar */
    .avatar-container img {
        width: 50px; /* Ajustez la largeur de l'avatar selon vos besoins */
        height: auto;
    }
  </style>
@endsection