@extends('frontend.main_master')
@section('content')

<section>
<div class="container">
    <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <img class="card-img-top rounded max80" src="{{ asset('frontend/assets/images/pays/is-map.jpg')}}" alt="">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <p>
            {{__('iceland.geoPart1')}}
           </p>
           

           <a href="{{ route ('blog.hotspot') }}" class="btn btn-primary btn-sm">{{__('iceland.geoLinkPointchaud')}}</a>
    </div>
    </div>
</div>
</section>
@endsection