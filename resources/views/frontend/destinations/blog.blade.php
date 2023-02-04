@extends('frontend.main_master')
@section('content')

<section class="section-padding">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  timeline">
    
    <div class="row justify-content-center">
            
            <article class="col-lg-6 col-sm-6 mb-5">
                    <div class="card rounded  border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
                    <img class="card-img-top rounded" src="{{ asset('frontend/assets/images/blog/blog1header.jpg')}}" alt="{{__('blog.Titre1')}}">
                    <div class="card-body">
                        <!-- post meta -->
                        
                        <a href="blog-single.html">
                        <h4 class="card-title">{{__('blog.Titre1')}}</h4>
                        </a>
                        <p class="card-text">{{__('blog.Desc1')}}</p>
                        <a href="{{ route ('blog.hotspot') }}" class="btn btn-primary btn-sm">{{__('blog.Button1')}}</a>
                    </div>
                    </div>
            </article>
            
            

    </div>

</div>
</section>
@endsection