@extends('frontend.main_master')
@section('fincss')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/flexbin.css')}}" />
@endsection
@section('fullscripts')
<script src="{{asset('frontend/assets/js/freewall.js')}}"></script>
@endsection
@section('content')

<div class="pt-5">
       <div id="leftwall" class="col-2">
		   </div>
       <div id="rightwall" class="col-10">
		   <div id="container">     
              @foreach($pictures as $photo)
                   <div class="item">
                   <a href="product/1.html"><img src="{{ $photo->medium }}" width="100%" /></a>
                   <a href="product/1.html" class="thumbnail"><img src="{{ $photo->user->profile_photo_path }}" width="40" height="40" /></a>
                  </div>
              @endforeach
          </div>
		</div>
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
	
.thumbnail {
    position: absolute;	
    top: 10px;
    right: 10px;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    overflow: hidden;
	border: 2px solid #ccc; 
}

.thumbnail img {
    display: block;
    width: 100%;
    height: auto;
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
                     wall.fitHeight();
              }
       });
      
       var images = wall.container.find('.item');


       images.find('img').on('load', function() {
              wall.fitHeight();
       
       });

$( document ).ready()
{
       wall.fitWidth();
       wall.fitHeight();
}

@endsection