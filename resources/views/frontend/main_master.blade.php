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

            <title>My Secret Map</title>
            
            <!-- Bootstrap -->
            <link rel="stylesheet" href="{{  asset('frontend/assets/plugins/bootstrap/bootstrap.min.css') }}">
            <!-- FontAwesome -->
            <script src="https://kit.fontawesome.com/0ecce2a19c.js" crossorigin="anonymous"></script>
           
            <!-- Animation -->
            <link rel="stylesheet" href="{{  asset('frontend/assets/plugins/animate-css/animate.css') }}">
            <!-- slick Carousel -->
            <link rel="stylesheet" href="{{  asset('frontend/assets/plugins/slick/slick.css') }}">
            <link rel="stylesheet" href="{{  asset('frontend/assets/plugins/slick/slick-theme.css') }}">
            <!-- Colorbox -->
            <link rel="stylesheet" href="{{  asset('frontend/assets/plugins/colorbox/colorbox.css') }}">
            <!-- Template styles-->
            <link rel="stylesheet" href="{{  asset('frontend/assets/css/style.css') }}">
            
            @yield('css')
            @livewireStyles
           

           
    </head>
    <body>
        <div class="body-inner">
      
          <div id="top-bar" class="top-bar">
              <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                      <ul class="top-info text-center text-md-left ">
                           <li><i class="fas fa-map-marker-alt"></i> <p class="info-text"></p>
                          </li>
                      </ul>
                    </div>
                    <!--/ Top info end -->
        
                    <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
                      <ul class="list-unstyled">
                          <li>
                            <a title="Facebook" href="https://facebbok.com/themefisher.com">
                                <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                            </a>
                            <a title="Twitter" href="https://twitter.com/themefisher.com">
                                <span class="social-icon"><i class="fab fa-twitter"></i></span>
                            </a>
                            <a title="Instagram" href="https://www.instagram.com/my_secret_map/">
                                <span class="social-icon"><i class="fab fa-instagram"></i></span>
                            </a>
                            <a title="Linkdin" href="https://github.com/themefisher.com">
                                <span class="social-icon"><i class="fab fa-github"></i></span>
                            </a>
                          </li>
                      </ul>
                    </div>
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
                    <img loading="lazy" src="{{  asset('frontend/assets/images/logoh55.png') }}" alt="My Secret map">
                  </a>
              </div><!-- logo end -->
    
              <div class="col-lg-9 header-right">
                  <ul class="top-info-box">
                    <li>
                      <div class="info-box">
                        <div class="info-box-content">
                           
                            <p class="info-box-subtitle">nouvelles destinations</p>
                            <p class="info-box-title">Bientôt</p>
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
                      <a class="btn btn-primary" href="{{ URL::route('aboutus')}}">EN SAVOIR PLUS</a>
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
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">DESTINATIONS <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                  <li class="dropdown-submenu">
                                  <a href="#!" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('frontend/assets/images/continent/afrique.png') }}" style="height:32px;height:32px"></img>AFRICA</a>
                                  <ul class="dropdown-menu">
                                    <li><a href="{{ url('destination') }}/RE">LA REUNION</a></li>
                                    <li><a href="#!">ILE MAURICE</a></li>
                                    <li><a href="{{ url('destination') }}/RG">RODRIGUES</a></li>
                                    
                                  </ul>
                                 
                              </li>
                              <li class="dropdown-submenu">
                              <a href="#!" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('frontend/assets/images/continent/europe.png') }}" style="height:32px;height:32px">EUROPE</a>
                              <ul class="dropdown-menu">
                                <li><a href="{{ url('iceland') }}"><img src="{{ asset('frontend/assets/images/continent/iceland.png') }}" style="height:32px;height:32px"></img>ICELAND</a></li>
                                
                              </ul>
                            </li>
                            </ul>
                        </li>
                
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">ROAD MAP <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="{{ URL::route('nextdestinations')}}">NEXT DESTINATIONS</a></li>
                              <li><a href="{{ URL::route('whatsnext')}}">NEW FEATURES</a></li>
                              
                            </ul>
                        </li>
                
                        <li class="nav-item"><a class="nav-link" href="{{ URL::route('contact')}}">Contact</a></li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">BE PARTNERS <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="{{ URL::route('benefits')}}">BENEFITS</a></li>
                              <li><a href="{{ URL::route('photographers')}}">PHOTOGRAPHERS</a></li>
                              <li><a href="{{ URL::route('tourism')}}">TOURISM BOARD</a></li>
                            </ul>
                        </li>
                        @auth
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-user"> </i> {{ __('menu.Bonjour') }} {{Auth::user()->name}} <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="{{ URL::route('myaccount')}}">{{ __('menu.Profil') }}</a></li>
                              @if (auth()->user()->isPhotographer())
                              <li><a href="{{ URL::route('medias')}}">GESTION MEDIAS</a></li>
                              @else
                              <li><a href="{{ URL::route('logout')}}">DEVENIR PHOTOGRAPHE</a></li>
                              @endif
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
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Config::get('languages')[App::getLocale()] }} <i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu" role="menu">
                          @foreach (Config::get('languages') as $lang => $language)
                              @if ($lang != App::getLocale())
                                      <li><a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a></li>
                              @endif
                          @endforeach
                          </ul>
                      </li>

                      @auth
                      @if (auth()->user()->isAdmin())
                      <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Admin <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu" role="menu">
                             <li><a class="dropdown-item" href="{{ route('admin.listspots') }}"> Tableaux de bord</a></li>
                             <li><a class="dropdown-item" href="{{ route('admin.listspots') }}"> Gestion Spots</a></li>
                             <li><a class="dropdown-item" href="{{ route('admin.circuits') }}"> Gestion Circuits</a></li>

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
            <h3 class="widget-title">About Us</h3>
            <img loading="lazy" width="200px" class="footer-logo" src="{{  asset('frontend/assets/images/logoh55w.png') }}" alt="Constra">
            <p>{{ __('index.Aboutme') }}</p>
            <div class="footer-social">
              <ul>
                <li><a href="https://facebook.com/themefisher" aria-label="Facebook"><i
                      class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://twitter.com/themefisher" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                </li>
                <li><a href="https://www.instagram.com/my_secret_map/" aria-label="Instagram"><i
                      class="fab fa-instagram"></i></a></li>
                <li><a href="https://github.com/themefisher" aria-label="Github"><i class="fab fa-github"></i></a></li>
              </ul>
            </div><!-- Footer social end -->
          </div><!-- Col end -->

          <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
            <h3 class="widget-title">{{ __('index.OT') }}</h3>
            <div class="working-hours">
              We work 7 days a week, every day excluding major holidays. Contact us if you have an emergency, with our
              Hotline and Contact form.
              <br><br> Monday - Friday: <span class="text-right">10:00 - 16:00 </span>
              <br> Saturday: <span class="text-right">12:00 - 15:00</span>
              <br> Sunday and holidays: <span class="text-right">09:00 - 12:00</span>
            </div>
          </div><!-- Col end -->

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
            <h3 class="widget-title">Services</h3>
            <ul class="list-arrow">
              <li><a href="service-single.html">Pre-Construction</a></li>
              <li><a href="service-single.html">General Contracting</a></li>
              <li><a href="service-single.html">Construction Management</a></li>
              <li><a href="service-single.html">Design and Build</a></li>
              <li><a href="service-single.html">Self-Perform Construction</a></li>
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
                <li><a href="about.html">About</a></li>
                <li><a href="team.html">Our people</a></li>
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
  <script src="{{  asset('frontend/assets/plugins/jQuery/jquery.min.js') }}"></script>
  <!-- Bootstrap jQuery -->
  <script src="{{  asset('frontend/assets/plugins/bootstrap/bootstrap.min.js') }}" defer></script>
  <!-- Slick Carousel -->
  <script src="{{  asset('frontend/assets/plugins/slick/slick.min.js') }}"></script>
  <script src="{{  asset('frontend/assets/plugins/slick/slick-animation.min.js') }}"></script>
  <!-- Color box -->
  <script src="{{  asset('frontend/assets/plugins/colorbox/jquery.colorbox.js') }}"></script>
  <!-- shuffle -->
  <script src="{{  asset('frontend/assets/plugins/shuffle/shuffle.min.js') }}" defer></script>

  <!-- Template custom -->
  <script src="{{  asset('frontend/assets/js/script.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/luxon@2.4.0/build/global/luxon.min.js"></script>

  
  
  @yield('fullscripts')
  <script>
  
    @yield('scripts')
  
</script>
  </div><!-- Body inner end -->
  @livewireScripts
  </body>

  </html>