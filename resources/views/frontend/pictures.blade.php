@extends('frontend.main_master')
@section('fincss')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/flexbin.css')}}" />
@endsection
@section('content')

      
<div class="flexbin flexbin-margin">         
              @foreach($pictures as $photo)
              <div class="smartbin-grid-item">
                   <a href="product/1.html"><img src="{{ $photo->medium }}" /></a>
              </div>
              @endforeach
          </div>


<style>
       .smartbin-grid {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: stretch;
}

.smartbin-grid-item {
  margin-bottom: 16px;
  width: calc(33.33% - 10px);
}

.smartbin-grid-item img {
  width: 100%;
  height: auto;
  object-fit: cover;
}
</style>
@endsection
@section('scripts')

@endsection