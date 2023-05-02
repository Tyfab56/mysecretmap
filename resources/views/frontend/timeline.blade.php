@extends('frontend.main_master')
@section('fullscripts')
<script src="{{ asset('frontend/assets/js/timeline.js')}}"></script>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/timeline.css')}}" />
@endsection
@section('content')
<header class="cd-main-header text-center flex flex-column flex-center">
    <h1>{{__('index.filinfo')}}</h1>
    <p class="margin-top-sm">👈<a class="color-inherit" href="https://codyhouse.co/gem/vertical-timeline/">Article &amp; Download</a></p>
  </header>

  <section class="cd-timeline js-cd-timeline">
    <div class="container max-width-lg cd-timeline__container">
      @foreach ($timeline as $spot)
      
        <div class="cd-timeline__block">
        <div class="cd-timeline__img cd-timeline__img--picture">
          <img src="assets/img/cd-icon-picture.svg" alt="Picture">
        </div> <!-- cd-timeline__img -->

        <div class="cd-timeline__content text-component">
          <h2>{{$spot->texte}}</h2>
          <p class="color-contrast-medium">{{$spot->description}}</p>

          <div class="flex justify-between items-center">
            <span class="cd-timeline__date">{{$spot->date}}</span>
          
          </div>
        </div> <!-- cd-timeline__content -->
      </div> <!-- cd-timeline__block -->
      @endforeach
      <div class="cd-timeline__block">
        <div class="cd-timeline__img cd-timeline__img--picture">
          <img src="assets/img/cd-icon-picture.svg" alt="Picture">
        </div> <!-- cd-timeline__img -->

        <div class="cd-timeline__content text-component">
          <h2>Title of section 1</h2>
          <p class="color-contrast-medium">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>

          <div class="flex justify-between items-center">
            <span class="cd-timeline__date">Jan 14</span>
            <a href="#0" class="btn btn--subtle">Read more</a>
          </div>
        </div> <!-- cd-timeline__content -->
      </div> <!-- cd-timeline__block -->

      <div class="cd-timeline__block">
        <div class="cd-timeline__img cd-timeline__img--movie">
          <img src="assets/img/cd-icon-movie.svg" alt="Movie">
        </div> <!-- cd-timeline__img -->

        <div class="cd-timeline__content text-component">
          <h2>Title of section 2</h2>
          <p class="color-contrast-medium">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde?</p>
          
          <div class="flex justify-between items-center">
            <span class="cd-timeline__date">Jan 18</span>
            <a href="#0" class="btn btn--subtle">Read more</a>
          </div>
        </div> <!-- cd-timeline__content -->
      </div> <!-- cd-timeline__block -->

      <div class="cd-timeline__block">
        <div class="cd-timeline__img cd-timeline__img--picture">
          <img src="assets/img/cd-icon-picture.svg" alt="Picture">
        </div> <!-- cd-timeline__img -->

        <div class="cd-timeline__content text-component">
          <h2>Title of section 3</h2>
          <p class="color-contrast-medium">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, obcaecati, quisquam id molestias eaque asperiores voluptatibus cupiditate error assumenda delectus odit similique earum voluptatem doloremque dolorem ipsam quae rerum quis. Odit, itaque, deserunt corporis vero ipsum nisi eius odio natus ullam provident pariatur temporibus quia eos repellat consequuntur perferendis enim amet quae quasi repudiandae sed quod veniam dolore possimus rem voluptatum eveniet eligendi quis fugiat aliquam sunt similique aut adipisci.</p>

          <div class="flex justify-between items-center">
            <span class="cd-timeline__date">Jan 24</span>
            <a href="#0" class="btn btn--subtle">Read more</a>
          </div>
        </div> <!-- cd-timeline__content -->
      </div> <!-- cd-timeline__block -->

      <div class="cd-timeline__block">
        <div class="cd-timeline__img cd-timeline__img--location">
          <img src="assets/img/cd-icon-location.svg" alt="Location">
        </div> <!-- cd-timeline__img -->

        <div class="cd-timeline__content text-component">
          <h2>Title of section 4</h2>
          <p class="color-contrast-medium">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>

          <div class="flex justify-between items-center">
            <span class="cd-timeline__date">Feb 14</span>
            <a href="#0" class="btn btn--subtle">Read more</a>
          </div>
        </div> <!-- cd-timeline__content -->
      </div> <!-- cd-timeline__block -->

      <div class="cd-timeline__block">
        <div class="cd-timeline__img cd-timeline__img--location">
          <img src="assets/img/cd-icon-location.svg" alt="Location">
        </div> <!-- cd-timeline__img -->

        <div class="cd-timeline__content text-component">
          <h2>Title of section 5</h2>
          <p class="color-contrast-medium">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum.</p>

          <div class="flex justify-between items-center">
            <span class="cd-timeline__date">Feb 18</span>
            <a href="#0" class="btn btn--subtle">Read more</a>
          </div>
        </div> <!-- cd-timeline__content -->
      </div> <!-- cd-timeline__block -->

      <div class="cd-timeline__block">
        <div class="cd-timeline__img cd-timeline__img--movie">
          <img src="assets/img/cd-icon-movie.svg" alt="Movie">
        </div> <!-- cd-timeline__img -->

        <div class="cd-timeline__content text-component">
          <h2>Final Section</h2>
          <p class="color-contrast-medium">This is the content of the last section</p>

          <div class="flex justify-between items-center">
            <span class="cd-timeline__date">Feb 26</span>
          </div>
        </div> <!-- cd-timeline__content -->
      </div> <!-- cd-timeline__block -->
    </div>
  </section> <!-- cd-timeline -->

</body>
@endsection