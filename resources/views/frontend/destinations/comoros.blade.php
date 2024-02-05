@extends('frontend.main_master')
@section('content')
<!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="center">
    <h1 class="my-4">{!! __('comores.titre') !!}</h1>
    <h1 class="my-4">{!! __('comores.titre2') !!}</h1>
    <div>
      <small>{!! __('comores.message') !!}</small>
      <small>{!! __('comores.besoins') !!}</small>
    
   <div class="row mt5 mb5 center">  <h1 class="my-4">{!! __('comores.optionObtenez') !!}</h1></div>
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
        <a class="btn btn-primary" href="{{ route('contact') }}">{!! __('comores.contact')!!}</a>
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
        <a class="btn btn-primary" href="{{ route('contact') }}">{!! __('comores.contact')!!}</a>
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
         <a class="btn btn-primary" href="{{ route('contact') }}">{!! __('comores.contact')!!}</a>
      </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Project Four -->
    <div class="row">

      <div class="col-md-7">
        <a href="#">
          <img class="img-fluid rounded mb-3 mb-md-0" src="{{ asset('frontend/assets/images/comores4.jpg')}}" alt="">
        </a>
      </div>
      <div class="col-md-5">
      <h3>{!! __('comores.option4Titre') !!}</h3>
        <p>{!! __('comores.option4Description')!!}</p>
        <a class="btn btn-primary" href="{{ route('contact') }}">{!! __('comores.contact')!!}t</a>
      </div>
    </div>
    <!-- /.row -->

    <hr>

    

  </div>
  <!-- /.container -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
$(document).ready(function(){
  $(".accordion").click(function() {
    // Ferme tous les panels ouverts sauf celui lié à l'accordéon cliqué et réinitialise leurs icônes
    $(".panel").not($(this).next()).slideUp('slow');
    $(".accordion").not($(this)).removeClass("active").find("i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
    
    // Bascule l'état actif de l'accordéon cliqué et son icône
    $(this).toggleClass("active");
    if ($(this).hasClass("active")) {
      $(this).find("i").removeClass("fa-chevron-down").addClass("fa-chevron-up");
    } else {
      $(this).find("i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
    }
    
    // Bascule le panel suivant (sous l'accordéon cliqué) avec un effet de slide
    $(this).next(".panel").slideToggle("slow");
  });
});

</script>
<style>
    .accordion {
      background-color: #f2f2f2; /* Fond gris */
      color: #444;
      cursor: pointer;
      padding: 18px;
      width: 100%;
      border: none;
      text-align: left;
      outline: none;
      font-size: 15px;
      transition: 0.4s;
    }

    .accordion:hover, .accordion.active {
      background-color: #ddd; /* Plus foncé au survol */
    }

    .panel {
      padding: 0 18px;
      background-color: white;
      display: none; /* Caché par défaut */
      overflow: hidden;
    }
  </style>
@endsection