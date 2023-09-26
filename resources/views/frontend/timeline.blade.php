@extends('frontend.main_master')
@section('scripts')
var page = 2;
var isloading = false;


$(window).scroll(function() {

   var scrollTop = $(this).scrollTop();
   var windowHeight = $(this).height();
   var documentHeight = $(document).height();
   var footerHeight = $('#footer').height(); 

   
   var timelineHeight = $('.cd-timeline').offset().top + $('.cd-timeline').height() + footerHeight;
  
   if (scrollTop + windowHeight >= timelineHeight -600) 
   {
      loadMoreData(page);
   }
   
});
function loadMoreData(numpage){
  console.log('load');

  if (isloading) {
    return;
  }

  let lastPage = Math.ceil($('.cd-timeline__block').length / 5)+1;
  console.log(lastPage);
  console.log(page);

  if (page > lastPage) {
    return;
  }

    isloading = true;
    $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            datatype: 'html',         
            success: function(response) {                  
                    $('.cd-timeline').append(response);
                    isloading = false;
                    page++;           
              },
              error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus + ': ' + errorThrown);
                isloading = false;
               }
          
        });
        
      
    
}

 @endsection 
@section('fullscripts')
<script src="{{ asset('frontend/assets/js/timeline.js')}}"></script>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/timeline.css')}}" />
@endsection
@section('content')
<header class="cd-main-header text-center flex flex-column flex-center">
    <h1>{{__('index.filinfo')}}</h1>
    <p class="margin-top-sm">{{__('index.filinfosub')}}</p>
  </header>

  <section class="cd-timeline js-cd-timeline">
    <div class="container max-width-lg cd-timeline__container">
      @foreach ($items as $spot)
      
        <div class="cd-timeline__block">
        <div class="cd-timeline__img cd-timeline__img--picture">
         
        <img src="{{ asset('frontend/assets/images/icon-image/' . $spot->timelinescat->icon) }}" alt="Picture">

        </div> <!-- cd-timeline__img -->

        <div class="cd-timeline__content text-component">
    <div class="content-left">
        <h6>{{$spot->texte}}</h6>
        <p class="color-contrast-medium">{{$spot->description}}</p>
        @if(!empty($spot->page))
            <a href="{{$spot->page}}" class="btn">Voir la page</a>
        @endif
        <div class="flex justify-between items-center">
            <h2><span class="cd-timeline__date">{{\Carbon\Carbon::parse($spot->date)->diffForHumans()}}</span></h2>
        </div>
    </div>
    <div class="content-right">
        <img src="{{$spot->image}}" class="content-image">
    </div>
</div> <!-- cd-timeline__content -->
      </div> <!-- cd-timeline__block -->
      @endforeach
      <div class="ajax-load" id="loading">
        <!-- L'indicateur de chargement sera affiché ici -->
    </div>
    </div>
  </section> <!-- cd-timeline -->

<style>
  .cd-main-header
  {
    height: 150px;
  }

  .cd-timeline__content {
    display: flex;
    justify-content: space-between;
    align-items: start;
}

.content-left {
    flex: 1;
    padding-right: 20px; /* Ajouter un espace entre le contenu et l'image */
}

.content-right {
    width: auto; /* permet au conteneur de s'ajuster à l'image */
    max-width: 200px;
}

.content-image {
    max-width: 100%; /* assurez-vous que l'image ne dépasse pas la largeur de son conteneur */
    height: auto;
}
</style>

</body>
@endsection