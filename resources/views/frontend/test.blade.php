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
                <img src="{{ $picture->user->avatar}}" class="avatar" alt="{{$picture->user->pseudo}}"/> 
         </span>
         
            
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
.avatar
{
  width : 45px;
  height : 45px;
  border-radius: 50%;
  border: 2px solid white

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







  </style>
@endsection