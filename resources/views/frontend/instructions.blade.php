@extends('frontend.main_master')


@section('content')

  
<section id="news" class="news">
<div class="container">
        <h1>{{ trans('instruction.title') }}</h1>
        <p>{{ trans('instruction.message') }}</p>
        <a href="{{ route('home') }}" class="btn btn-primary">{{ trans('instruction.back_to_home') }}</a>
    </div>
</section> 
  
  
@endsection


