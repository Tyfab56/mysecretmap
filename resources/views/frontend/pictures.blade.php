@extends('frontend.main_master')
@section('fincss')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/flexbin.css')}}" />
@endsection
@section('fullscripts')
<script src="{{asset('frontend/assets/js/freewall.js')}}"></script>
@endsection
@section('content')

      
        <div id="container">     
              @foreach($pictures as $photo)
                   <div class="item">
                   <a href="product/1.html"><img src="{{ $photo->medium }}" width="100%" /></a>
                  </div>
              @endforeach
          </div>


<style>
    .free-wall {
    margin: 15px;
}
    #container {
      width: 80%;
      margin: auto;
    }
    .item 
    {
        width: 33%;
    }
    .item img {
              margin: 0;
              display: block;
       }
</style>
@endsection
@section('scripts')


var wall = new Freewall("#container");

wall.reset({
              selector: '.item',
              animate: true,
              cellW: 150,
              cellH: 'auto',
              gutterX: 2,
              gutterY: 2,
              onResize: function() {
                     wall.fitWidth();
              }
       });

       var images = wall.container.find('.item');


       images.find('img').on('load', function() {
              wall.fitWidth();
       
       });

@endsection