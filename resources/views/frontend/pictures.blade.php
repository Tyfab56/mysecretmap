@extends('frontend.main_master')
@section('fincss')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/flexbin.css')}}" />
@endsection
@section('scripts')
<script src="{{asset('frontend/assets/js/freewall.js')}}"></script>
@endsection
@section('content')

      
<div id="grid">         
              @foreach($pictures as $photo)
  
                   <a href="product/1.html"><img src="{{ $photo->medium }}" /></a>
       
              @endforeach
          </div>


<style>
#grid {
      width: 80%;
      margin: auto;
    }
</style>
@endsection
@section('fullscripts')

$(function() {
      var wall = new Freewall("#grid");
                  wall.fitWidth();
    });

@endsection