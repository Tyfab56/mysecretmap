<!DOCTYPE html>
<html lang="{{Lang::locale()}}">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="My Secret Map, the best place to discover new touristic spots for your next trip">
  <meta name="author" content="">
  <meta name="keywords" content="spot,tourisme,photo, voyage">
  <meta name="robots" content="all">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
  <script async defer src="https://widget.getyourguide.com/dist/pa.umd.production.min.js" data-gyg-partner-id="ZBTCHLM"></script>

  <title>My Secret Map</title>

  <!-- Bootstrap 
  <link rel="stylesheet" href="{{  asset('frontend/assets/plugins/bootstrap/bootstrap.min.css') }}"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- FontAwesome -->
  <script src="https://kit.fontawesome.com/0ecce2a19c.js" crossorigin="anonymous"></script>

  <!-- Animation -->
  <link rel="stylesheet" href="{{  asset('frontend/assets/plugins/animate-css/animate.css') }}">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="{{  asset('frontend/assets/plugins/slick/slick.css') }}">
  <link rel="stylesheet" href="{{  asset('frontend/assets/plugins/slick/slick-theme.css') }}">
  <!-- Colorbox -->
  <link rel="stylesheet" href="{{  asset('frontend/assets/plugins/colorbox/colorbox.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


  @yield('css')
  @stack('styles')
  <link rel="stylesheet" href="{{  asset('frontend/assets/css/style.css') }}">

  @yield('fincss')


  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11392389513"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'AW-11392389513');
  </script>

</head>

<body>
  @php
  $messageController = resolve('App\Http\Controllers\MessageController');
  $unreadMessagesCount = $messageController->getUnreadMessagesCount();
  @endphp
  <div class="body-inner">

    <div id="top-bar" class="top-bar">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <ul class="top-info text-center text-md-left ">
              <li><i class="fas fa-map-marker-alt"></i>
                <p class="info-text"></p>
              </li>
            </ul>
          </div>
          <!--/ Top info end -->

          <!-- Zone de recherche -->
          <div class="col-lg-4 col-md-4 text-center">


            <form action="{{ route('search') }}" method="GET" class="search-form">
              <input type="text" name="query" placeholder="{{__('menu.Search')}}" class="search-input">
              <button type="submit" class="btn-search"><i class="fas fa-search"></i></button>
            </form>
          </div>

          <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
            @Auth
            <div class="messages-notification">
              <a href="{{ route('messages.index') }}">
                <i class="fas fa-envelope"></i>
                @if($unreadMessagesCount > 0)
                <span class="badge badge-danger">{{ $unreadMessagesCount }}</span>
                @endif
              </a>
            </div>


          </div>
          @EndAuth
          <!--/ Top social end -->
        </div>
        <!--/ Content row end -->
      </div>

      <!--/ Container end -->
    </div>
    <!--/ Topbar end -->

    <!-- Header start -->
    <header id="header" class="header-one">
      <div class="bg-white">
        <div class="container">
          <div class="logo-area">
            <div class="row align-items-center">
              <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                <a class="d-block" href="{{ URL::route('home')}}">
                  <img loading="lazy" src="{{  asset('frontend/assets/images/maplogo.gif') }}" alt="My Secret map">
                  <img loading="lazy" src="{{  asset('frontend/assets/images/logoh55.png') }}" alt="My Secret map">
                </a>
              </div><!-- logo end -->

              <div class="col-lg-9 header-right">
                <ul class="top-info-box">
                  <li>
                    <div class="info-box">
                      <div class="info-box-content">

                        <p class="info-box-title">{{ __('index.Newdestination') }}</p>
                        <p class="info-box-subtitle">{{ __('index.Newdestination2') }}</p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                        <p class="info-box-title">Carte des plus</p>
                        <p class="info-box-subtitle">beaux spots</p>
                      </div>
                    </div>
                  </li>
                  <li class="last">
                    <div class="info-box last">
                      <div class="info-box-content">
                        <p class="info-box-title">Conseils</p>
                        <p class="info-box-subtitle">pour votre voyage</p>
                      </div>
                    </div>
                  </li>
                  <li class="header-get-a-quote">
                    <a class="btn btn-primary" href="{{ URL::route('aboutus')}}">{{ __('index.AboutLink') }}</a>
                  </li>
                </ul><!-- Ul end -->
              </div><!-- header right end -->
            </div><!-- logo area end -->

          </div><!-- Row end -->
        </div><!-- Container end -->
      </div>

      <div class="site-navigation">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div id="navbar-collapse" class="collapse navbar-collapse">

                  <ul class="nav navbar-nav mr-auto">


                    <li class="nav-item"><a class="nav-link" href="{{ URL::route('home')}}">{{ __('menu.Home') }}</a></li>

                    <li class="nav-item dropdown">
                      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ __('menu.Infos') }} <i class="fa fa-angle-down"></i></a>

                      <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::route('timeline')}}">{{ __('menu.Filinfo') }}</a></li>
                        <li><a href="{{ URL::route('aboutus')}}">{{ __('menu.Infos') }}</a></li>
                        <li><a href="{{ URL::route('contact')}}">{{ __('menu.Contact') }}</a></li>
                      </ul>
                    </li>


                    <li class="nav-item dropdown">
                      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ __('menu.Destination') }} <i class="fa fa-angle-down"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-submenu">
                          <a href="#!" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('frontend/assets/images/continent/afrique.png') }}" style="height:32px;height:32px"></img>{{ __('menu.Afrique') }}</a>
                          <ul class="dropdown-menu">
                            <li><a href="{{ url('comoros')}}">{{ __('menu.Comores') }}</a></li>
                            <li><a href="#">{{ __('menu.Maurice') }}</a></li>
                            <li><a href="{{ url('destination') }}/RE">{{ __('menu.Reunion') }}</a></li>
                            <li><a href="{{ url('destination') }}/RG">{{ __('menu.Rodrigues') }}</a></li>

                          </ul>

                        </li>
                        <li class="dropdown-submenu">
                          <a href="#!" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('frontend/assets/images/continent/europe.png') }}" style="height:32px;height:32px">{{ __('menu.Europe') }}</a>
                          <ul class="dropdown-menu">
                            <li><a href="{{ url('iceland') }}"><img src="{{ asset('frontend/assets/images/continent/iceland.png') }}" style="height:32px;height:32px"></img>{{ __('menu.Iceland') }}</a></li>

                          </ul>
                        </li>
                      </ul>
                    </li>
                    <!-- <li class="nav-item"><a class="nav-link" href="{{ URL::route('blog')}}">{{ __('menu.Blog') }}</a></li> -->

                    <li class="nav-item dropdown">
                      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ __('menu.Store') }} <i class="fa fa-angle-down"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::route('audioguide')}}">{{ __('menu.Audioguide') }}</a></li>
                        <li><a href="{{ URL::route('portfolio.index')}}">{{ __('menu.Portfolio') }}</a></li>
                        <li><a href="{{ URL::route('affiliate')}}">{{ __('menu.Affiliate') }}</a></li>

                      </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ __('menu.Partner') }} <i class="fa fa-angle-down"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::route('transport')}}">{{ __('menu.Transport') }}</a></li>
                        <li><a href="{{ URL::route('bloggers')}}">{{ __('menu.Bloggers') }}</a></li>
                        <li><a href="{{ URL::route('hotels')}}">{{ __('menu.Hotels') }}</a></li>
                      </ul>
                    </li>
                    <!--
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">ROAD MAP <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="{{ URL::route('nextdestinations')}}">NEXT DESTINATIONS</a></li>
                              <li><a href="{{ URL::route('whatsnext')}}">NEW FEATURES</a></li>
                              
                            </ul>
                        </li> -->

                    <!--
                          <li class="nav-item"><a class="nav-link" href="{{ URL::route('contact')}}">Contact</a></li>
                         -->
                    <!--
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">BE PARTNERS <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="{{ URL::route('benefits')}}">BENEFITS</a></li>
                              <li><a href="{{ URL::route('photographers')}}">PHOTOGRAPHERS</a></li>
                              <li><a href="{{ URL::route('tourism')}}">TOURISM BOARD</a></li>
                            </ul>
                        </li>
                         -->
                    @guest

                    <li class="nav-item dropdown">
                      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-user"> </i> {{ __('menu.Photographer') }}</a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::route('photographers')}}">{{ __('menu.Photojoinus') }}</a></li>
                      </ul>
                    </li>

                    @endguest

                    @auth
                    <li class="nav-item dropdown">
                      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-user"> </i> {{ __('menu.Bonjour') }} {{Auth::user()->pseudo}} <i class="fa fa-angle-down"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::route('myaccount')}}">{{ __('menu.Profil') }}</a></li>
                        <!--@if (auth()->user()->isPhotographer())
                              <li><a href="{{ URL::route('medias')}}">{{ __('menu.Medias') }}</a></li>
                              @else
                              <li><a href="{{ URL::route('logout')}}">DEVENIR PHOTOGRAPHE</a></li>
                              @endif -->
                        <li><a href="{{ URL::route('logout')}}" class="red">{{ __('menu.Logout') }}</a></li>

                      </ul>
                    </li>



                    @endauth
                    @guest
                    <li class="nav-item dropdown">
                      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> {{ __('menu.Identification') }} <i class="fa fa-angle-down"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::route('login')}}">{{ __('menu.Connexion') }}</a></li>
                        <li><a href="{{ URL::route('register')}}">{{ __('menu.Inscription') }}</a></li>
                      </ul>
                    </li>


                    @endguest





                    <li class="nav-item dropdown">
                      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('frontend/assets/images/'.App::getLocale().'flag.jpg') }}" class="mr-1" style="width: 20px; height: 14px;">{{ Config::get('languages')[App::getLocale()] }} <i class="fa fa-angle-down"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        @foreach (Config::get('languages') as $lang => $language)
                        @if ($lang != App::getLocale())
                        <li> <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> <img src="{{ asset('frontend/assets/images/'.$lang.'flag.jpg') }}" class="mr-1" style="width: 20px; height: 14px;"> {{$language}}</a></li>
                        @endif
                        @endforeach
                      </ul>
                    </li>


                    @auth
                    @if (auth()->user()->isAdmin())
                    <li class="nav-item dropdown">
                      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Admin <i class="fa fa-angle-down"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"> Tableaux de bord</a></li>


                      </ul>
                    </li>
                    @endif
                    @endauth
                  </ul>
                </div>
              </nav>
            </div>
            <!--/ Col end -->
          </div>
          <!--/ Row end -->




        </div>
        <!--/ Container end -->

      </div>
      <!--/ Navigation end -->
    </header>
    <!--/ Header end -->

    @yield('content')



    <footer id="footer" class="footer bg-overlay">
      <div class="footer-main">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-lg-4 col-md-6 footer-widget footer-about">
              <h3 class="widget-title"><a class="btn btn-primary" href="{{ URL::route('aboutus')}}">{{ __('index.AboutLink') }}</a></h3>
              <img loading="lazy" width="200px" class="footer-logo" src="{{  asset('frontend/assets/images/logoh55w.png') }}" alt="Constra">
              <p>{{ __('index.Aboutme') }}</p>
              <div class="footer-social">
                <ul>
                  <li><a href="https://www.facebook.com/mysecretmap.fr/" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a></li>

                  <li><a href="https://www.instagram.com/my_secret_map/" aria-label="Instagram"><i class="fab fa-instagram"></i></a></li>

                </ul>
              </div><!-- Footer social end -->
            </div><!-- Col end -->

            <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
              <h3 class="widget-title">{{ __('index.OT') }}</h3>
              <div class="working-hours">
                {{ __('index.OTdesc') }}
                <br><br> <a class="read-more" href="mailto:{{ __('index.OTcontact') }}">{{ __('index.OTcontact') }}</a>
              </div>
            </div><!-- Col end -->

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
              <h3 class="widget-title">{{ __('index.More') }}</h3>
              <ul class="list-arrow">
                <li><a href="{{ URL::route('audioguides')}}">{{ __('index.Audioguide') }}</a></li>

              </ul>
            </div><!-- Col end -->
          </div><!-- Row end -->
        </div><!-- Container end -->
      </div><!-- Footer main end -->

      <div class="copyright">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="copyright-info">
                <span>Copyright &copy; <script>
                    document.write(new Date().getFullYear())
                  </script>, Designed &amp; Developed by <a href="https://my-lovely-planet.com">My Lovely Planet</a></span>
                <span>{{ __('index.Affiliation') }} </span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="footer-menu text-center text-md-right">
                <ul class="list-unstyled">
                  <li><a href="{{ URL::route('aboutus')}}">{{ __('index.AboutLink') }}</a></li>
                  <li><a href="{{ URL::route('audioguide')}}">{{ __('index.AudioguideLink') }}</a></li>
                  <li><a href="faq.html">Faq</a></li>
                  <li><a href="news-left-sidebar.html">Blog</a></li>
                  <li><a href="pricing.html">Pricing</a></li>
                </ul>
              </div>
            </div>
          </div><!-- Row end -->

          <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
            <button class="btn btn-primary" title="Back to Top">
              <i class="fa fa-angle-double-up"></i>
            </button>
          </div>

        </div><!-- Container end -->
      </div><!-- Copyright end -->
    </footer><!-- Footer end -->


    <!-- Javascript Files
  ================================================== -->

    <!-- initialize jQuery Library -->

    <!-- Bootstrap jQuery 
    <script src="{{  asset('frontend/assets/plugins/bootstrap/bootstrap.min.js') }}" defer></script>-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- Slick Carousel -->
    <script src="{{  asset('frontend/assets/plugins/slick/slick.min.js') }}"></script>
    <script src="{{  asset('frontend/assets/plugins/slick/slick-animation.min.js') }}"></script>
    <!-- Color box -->
    <script src="{{  asset('frontend/assets/plugins/colorbox/jquery.colorbox.js') }}"></script>
    <!-- shuffle -->
    <script src="{{  asset('frontend/assets/plugins/shuffle/shuffle.min.js') }}" defer></script>
    <script src="{{  asset('frontend/assets/js/counterup.min.js') }}"></script>

    <!-- Template custom -->
    <script src="{{  asset('frontend/assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/luxon@2.4.0/build/global/luxon.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>




    @yield('fullscripts')
    <script>
      @yield('scripts')
    </script>
  </div><!-- Body inner end -->
  @livewireScripts
  @stack('scripts')
</body>

</html>