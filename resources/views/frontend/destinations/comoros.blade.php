@extends('frontend.main_master')
@section('content')
<!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="my-4">{!! __('comores.titre') !!}</h1>
      <small>{!! __('comores.message') !!}</small>
      <small>{!! __('comores.besoins') !!}</small>
    

    <!-- Project One -->
    <div class="row">
      <div class="col-md-7">
        <a href="#">
        <img class="img-fluid rounded mb-3 mb-md-0" src="{{ asset('frontend/assets/images/comores1.jpg')}}" alt="">
        </a>
      </div>
      <div class="col-md-5">
        <h3>{!! __('comores.option1Titre') !!}</h3>
        <p>{!! __('comores.option1Description')!!}</p>
        <a class="btn btn-primary" href="#">Contactez nous</a>
      </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Project Two -->
    <div class="row">
      <div class="col-md-7">
        <a href="#">
        <img class="img-fluid rounded mb-3 mb-md-0" src="{{ asset('frontend/assets/images/comores2.jpg')}}" alt="">
        </a>
      </div>
      <div class="col-md-5">
      <h3>{!! __('comores.option2Titre') !!}</h3>
        <p>{!! __('comores.option2Description')!!}</p>
        <a class="btn btn-primary" href="#">View Project</a>
      </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Project Three -->
    <div class="row">
      <div class="col-md-7">
        <a href="#">
        <img class="img-fluid rounded mb-3 mb-md-0" src="{{ asset('frontend/assets/images/comores3.jpg')}}" alt="">
        </a>
      </div>
      <div class="col-md-5">
      <h3>{!! __('comores.option3Titre') !!}</h3>
        <p>{!! __('comores.option3Description')!!}</p>
         <a class="btn btn-primary" href="#">View Project</a>
      </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Project Four -->
    <div class="row">

      <div class="col-md-7">
        <a href="#">
          <img class="img-fluid rounded mb-3 mb-md-0" src="{{ asset('frontend/assets/images/comores1.jpg')}}" alt="">
        </a>
      </div>
      <div class="col-md-5">
        <h3>Project Four</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
        <a class="btn btn-primary" href="#">View Project</a>
      </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Pagination -->
    <ul class="pagination justify-content-center">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#">1</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#">2</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#">3</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>

  </div>
  <!-- /.container -->
@endsection