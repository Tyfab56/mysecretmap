@extends('frontend.main_master')
@section('content')
@auth
<section id="main-container" class="main-container">
    <div class="container">
  
      <div class="row">
        <div class="col-lg-8">
          <h3 class="border-title border-left mar-t0">{{ __('compte.MonCompte') }}</h3>
  
          <div class="accordion accordion-group accordion-classic" id="construction-accordion">
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    {{ __('compte.MesInfos') }}
                  </button>
                </h2>
              </div>
  
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                data-parent="#construction-accordion">
                <div class="card-body">
                  <div class="input-w">
                    <label for="name"><p><b>{{ __('compte.Name') }} :</b></p> </label>
                    <input type="text" name= "name" id="name" value="{{$user->name}}"/>
                </div>
                <div class="input-w">
                    <label for="pseudo"><p><b>{{ __('compte.Pseudo') }} :</b></p> </label>
                    <input type="text" name="pseudo" id="pseudo" value="{{$user->pseudo}}"/>
                </div>
                  <p><b>{{ __('compte.Email') }} : </b> {{$user->email}}</p>
               


                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    {{ __('compte.MesReseaux') }}
                  </button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#construction-accordion">
                <div class="card-body">
                  
                  <div class="input-w">
                    <label for="internet"><p><b>{{ __('compte.Web') }} :</b></p> </label>
                    <input class="w400p" type="text" name="internet" id="internet" value="{{$user->internet}}"/>
                </div>
                <div class="input-w">
                    <label for="pseudo"><p><b>{{ __('compte.Facebook') }} :</b></p> </label>
                    <input class="w400p" type="text" name="facebook" id="facebook" value="{{$user->facebook}}"/>
                </div>
                <div class="input-w">
                    <label for="instagram"><p><b>{{ __('compte.Instagram') }} :</b></p> </label>
                    <input class="w400p" type="text" name="instagram" id="instagram" value="{{$user->instagram}}"/>
                </div>

                  
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    {{ __('compte.MesCircuits') }}
                  </button>
                </h2>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                data-parent="#construction-accordion">
                <div class="card-body">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                  industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                  scrambled it to make a type specimen book.
                </div>
              </div>
            </div>
          </div>
          <!--/ Accordion end -->
        </div>


        <div class="col-lg-4 mt-5 mt-lg-0">

            <div class="sidebar sidebar-right">
              <div class="widget recent-posts">
                <h3 class="widget-title">Recent Posts</h3>
                <ul class="list-unstyled">
                  <li class="d-flex align-items-center">
                    <div class="posts-thumb">
                      <a href="#"><img loading="lazy" alt="news-image" src="images/news/news1.jpg"></a>
                    </div>
                    <div class="post-info">
                      <h4 class="entry-title">
                        <a href="#">We Just Completes $17.6 Million Medical Clinic In Mid-missouri</a>
                      </h4>
                    </div>
                  </li><!-- 1st post end-->
    
                  <li class="d-flex align-items-center">
                    <div class="posts-thumb">
                      <a href="#"><img loading="lazy" alt="news-img" src="images/news/news2.jpg"></a>
                    </div>
                    <div class="post-info">
                      <h4 class="entry-title">
                        <a href="#">Thandler Airport Water Reclamation Facility Expansion Project Named</a>
                      </h4>
                    </div>
                  </li><!-- 2nd post end-->
    
                  <li class="d-flex align-items-center">
                    <div class="posts-thumb">
                      <a href="#"><img loading="lazy" alt="news-img" src="images/news/news3.jpg"></a>
                    </div>
                    <div class="post-info">
                      <h4 class="entry-title">
                        <a href="#">Silicon Bench And Cornike Begin Construction Solar Facilities</a>
                      </h4>
                    </div>
                  </li><!-- 3rd post end-->
    
                </ul>
    
              </div><!-- Recent post end -->
            </div><!-- Sidebar end -->
    
          </div><!-- Col end -->
      </div>
    </div>
</section>


@endauth
@guest
vous devez être connecté
@endguest
@endsection