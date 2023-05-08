@extends('frontend.main_master')
@section('fincss')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/flexbin.css')}}" />
@endsection
@section('content')

      
<div class="flexbin flexbin-margin">         
              @foreach($pictures as $photo)
              <a href="product/1.html"><img src="{{ $photo->medium }}" /></a>
              @endforeach
          </div>



@endsection
@section('scripts')

@endsection