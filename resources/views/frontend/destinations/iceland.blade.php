@extends('frontend.main_master')
@section('content')
<section class="section-padding">
<div class="container">
<div class="row">
<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12  timeline">
    <h2 class="mb-4">LES ORIGINES DE L'ISLANDE</h2>
    <h6>Pour optimiser votre visite, c'est important de bien connaitre les origines géologiques de l'île</h6>
    <div class="row justify-content-center">
            
            <article class="col-lg-6 col-sm-6 mb-5">
                    <div class="card rounded  border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
                    <img class="card-img-top rounded" src="{{ asset('frontend/assets/images/pays/is_geo.jpg')}}" alt="{{__('iceland.geoButton')}}">
                    <div class="card-body">
                        <!-- post meta -->
                        
                        <a href="blog-single.html">
                        <h4 class="card-title">{{__('iceland.geo')}}</h4>
                        </a>
                        <p class="card-text">{{__('iceland.geoSubTitle')}}</p>
                        <a href="{{ route ('iceland.geology') }}" class="btn btn-primary btn-sm">{{__('iceland.geoButton')}}</a>
                    </div>
                    </div>
            </article>
            <article class="col-lg-6 col-sm-6 mb-5">
                    <div class="card rounded border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
                    <img class="card-img-top rounded" src="{{ asset('frontend/assets/images/pays/is_volcan.jpg')}}" alt="{{__('iceland.volcanButton')}}">
                    <div class="card-body">
                        <!-- post meta -->
                        
                        <a href="blog-single.html">
                        <h4 class="card-title">{{__('iceland.volcan')}}</h4>
                        </a>
                        <p class="card-text">{{__('iceland.volcanSubTitle')}}</p>
                        <a href="{{ route ('iceland.geology') }}" class="btn btn-primary btn-sm">{{__('iceland.volcanButton')}}</a>
                    </div>
                    </div>
            </article>
            

    </div>

</div>
<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
    <div class="sidebar sidebar-right">
        <div class="sidebar-wrap mt-5 mt-lg-0">
            <div class="sidebar-widget mb-5 text-center p-3">
                    <img src="{{ asset('frontend/assets/images/team/fab1.jpg')}}" alt="Fabrice H" class="img-fluid avatar">
                    <h4 class="mb-0 mt-4">Fabrice H</h4>
                    <p>{{__('auteur.FabricehTitle')}}</p>
                    <p>{{__('auteur.FabricehDesc')}}</p>

            </div>
        </div>
    </div>
</div>

</div>
</div>
</section>
@endsection