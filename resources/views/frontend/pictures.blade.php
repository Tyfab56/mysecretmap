@extends('frontend.main_master')
@section('fincss')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/flexbin.css')}}" />
@endsection
@section('fullscripts')
<script src="{{asset('frontend/assets/js/freewall.js')}}"></script>
@endsection
@section('content')

      
<div id="grid">         
              @foreach($pictures as $photo)
                   <div class="item">
                   <a href="product/1.html"><img src="{{ $photo->medium }}" /></a>
                  </div>
              @endforeach
          </div>


<style>
#grid {
      width: 80%;
      margin: auto;
    }
</style>
@endsection
@section('scripts')
var wall;
$( document ).ready(function() {
      wall = new Freewall("#grid");
                  wall.fitWidth();
});

@endsection