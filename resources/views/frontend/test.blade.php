@extends('frontend.main_master')

@section('css')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/GridOverflow3D.css')}}" />
@endsection

@section('content')
<div class="gridOverflow go-masonry">

    @foreach ($pictures as $picture)
    <a class="go_gridItem">
         <img src="{{ $picture->medium}}" /> 
         <span class="go_caption go_caption-full">
                {{ $picture->spot->name}}
         </span>
         <div class="overlay">
                <img src="{{ $picture->user->avatar }}" alt="Small Overlay Image">
            </div>
      
            
    </a>
    @endforeach
  <div class="go_gridItem go_gridItem-centered" href="someURL"><p> centered content - typically some text </p> </div>
 
</div>
<div class="row">{{ $pictures->links() }}
<style>
  .gridOverflow {
    max-width: 90%;
    margin-top: 10px;
    margin-bottom: 10px;
    --masonryItemHeight: 180px;
  }
  .go_gridItem .go_caption {
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
}

/* Affiche le texte au survol de l'élément .go_gridItem */
.go_gridItem:hover .go_caption {
    opacity: 1;
    background-color: rgba(0, 0, 0, 0.5);
    bottom: 0;
    right: 0;
    color: white;
    box-sizing: border-box;
    padding: 0.15rem 1rem;
    text-align: center;
    position: absolute;

  }

  .overlay {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1; /* Ensures the overlay is on top of the main image */
    opacity: 0; /* Initially hide the overlay */
    transition: opacity 0.3s ease-in-out; /* Add a smooth transition effect */
}

.go_gridItem:hover .overlay {
    opacity: 1; /* Show the overlay on hover */
}

.overlay img {
    width: 50px; /* Adjust the size of the overlay image as needed */
    height: auto;
}







  </style>
@endsection