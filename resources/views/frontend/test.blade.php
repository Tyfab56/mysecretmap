@extends('frontend.main_master')

@section('css')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/GridOverflow3D.css')}}" />
@endsection

@section('content')
<div class="gridOverflow go-masonry go-zoomFx go-actionIcon">

    @foreach ($pictures as $picture)
    <a class="go_gridItem" href="{{ $picture->medium }}">
    <img src="{{ $picture->medium}}" /> 
    </a>
    @endforeach
  <div class="go_gridItem go_gridItem-centered" href="someURL"><p> centered content - typically some text </p> </div>
 
</div>
{{ $pictures->links() }}
<style>
  .gridOverflow {
    max-width: 90%;
    margin-top: 10px;
    margin-bottom: 10px;
    --masonryItemHeight: 180px;
  }
  </style>
@endsection