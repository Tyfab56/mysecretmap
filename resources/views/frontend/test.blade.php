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
  </style>
@endsection