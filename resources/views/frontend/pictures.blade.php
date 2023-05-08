@extends('frontend.main_master')
@section('fincss')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/flexbin.css')}}" />
@endsection
@section('fullscripts')
<script src="{{asset('frontend/assets/js/freewall.js')}}"></script>
@endsection
@section('content')

      
          <div id="freewall">         
              @foreach($pictures as $photo)
                   <div class="item">
                   <a href="product/1.html"><img src="{{ $photo->medium }}" /></a>
                  </div>
              @endforeach
          </div>


<style>

</style>
@endsection
@section('scripts')
var wall;
$( document ).ready(function() {
       var wall = new freewall("#freewall");
    wall.fitWidth();

    // Configuration de la grille (taille des marges, espacement entre les éléments, etc.)
    wall.reset({
        selector: 'img',
        animate: true,
        cellW: 200,
        cellH: 'auto',
        delay: 30,
        onResize: function() {
            wall.fitWidth();
        }
    });
});

@endsection