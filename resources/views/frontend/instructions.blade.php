@extends('frontend.main_master')


@section('content')

  
<section id="news" class="news">
<div class="container">
        <h1>{{__('instruction.title')}}</h1>
        <p>{{__('instruction.message')}}</p>
        <a href="{{ route('home') }}" class="btn btn-primary">{{__('instruction.back_to_home')}}</a>
    </div>
</section> 
  
  
@endsection


