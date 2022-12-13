@extends('frontend.main_master')
@section('css')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/grid.css')}}" /
@endsection
@section('content')
<section id="ts-features" class="ts-features">
    <div class="container">
        <div class="row">
          <div class="col-lg-12"><img  class="w100" src="{{$spot->imgpanolarge??''}}"></div>
        </div>
        <div class="col-12">
          <form method="post" action="{{ route('addimagespot.store') }}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" id="spotid" name="spotid" value="{{$spot->id}}">
              <div class="form-group">
              
                <div class="controls">
                    <input type="file" name="img" class="form-control" id="img">

                    <div class="help-block"></div>
                    @error('img')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class=" text-xs-right">
              <input type="submit" name="file" class="btn btn-rounded btn-primary mb-5" value="Validation">
            
          </div>
          </form>
        </div>
        <div class="row">
          <div class="col-lg-3 bgregbox">
           <p><b>Nombre d'images :</b> {{ $spottotalcount }}</p>
          </div>
          <div class="col-lg-9">
            <ul class="grid">
            @foreach($pictures as $picture)
          
              <li>
                <figure>
                  <img width="{{ $picture->width }}" height="{{ $picture->height}}" src="{{ $picture->medium }}" alt="">
                </figure>
              </li>
              
            @endforeach
            </ul>
          </div>
        </div>
@endsection