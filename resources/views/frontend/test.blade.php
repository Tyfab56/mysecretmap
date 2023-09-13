@extends('frontend.main_master')

@Ssection('css')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/GridOverflow3D.css')}}" />
@endsection

@section('content')
<div class="gridOverflow go-masonry go-zoomFx go-actionIcon">

    @foreach ($pictures as $picture)
    <a class="go_gridItem" href="someURL">
    <img src="{{ $picture->medium }}" /> 
    </a>
    @endforeach
  <div class="go_gridItem go_gridItem-centered" href="someURL"><p> centered content - typically some text </p> </div>
</div>
@endsection