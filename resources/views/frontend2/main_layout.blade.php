<!DOCTYPE html>
<html lang="{{ Lang::locale() }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="My Secret Map, the best place to discover new touristic spots for your next trip">
    <meta name="author" content="My Lovely Planet">
    <meta name="keywords" content="spot, tourisme, photo, voyage">
    <meta name="robots" content="all">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />

    <title>My Secret Map</title>

    {{-- Sections pour insérer ton propre CSS au besoin --}}
    @yield('css')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css2') }}">
    @stack('styles')
    @yield('fincss')
</head>

<body>
    {{-- On retire complètement la top-bar et la zone de recherche --}}

    <div class="body-inner">

        <!-- Header start -->
        <header id="header" class="header-one">
            <div style="background-color: #fff; padding: 20px 0;">
                <div class="container">
                    <div class="row align-items-center">
                        {{-- Logo centré --}}
                        <div class="logo col-12 text-center mb-3">
                            <a class="d-block" href="{{ route('home') }}">
                                {{-- Ajuste l’affichage du logo comme tu le souhaites --}}
                                <img loading="lazy" src="{{ asset('frontend/assets/images/maplogo.gif') }}"
                                    alt="My Secret Map" style="max-height: 60px;">
                                {{-- Second logo si nécessaire --}}
                                <img loading="lazy" src="{{ asset('frontend/assets/images/logoh55.png') }}"
                                    alt="My Secret Map" style="max-height: 60px;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Navigation --}}
            <div class="site-navigation" style="background-color: #333;">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-dark" style="padding: 10px 0;">
                        {{-- Bouton mobile --}}
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div id="navbar-collapse" class="collapse navbar-collapse">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}">{{ __('menu.Home') }}</a>
                                </li>

                                {{-- Exemple de dropdown --}}


                                {{-- Ajoute ici tes autres items/menu déroulants si nécessaire --}}
                                {{-- ... --}}

                                @guest
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                            {{ __('menu.Identification') }}
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="{{ route('login') }}">{{ __('menu.Connexion') }}</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('register') }}">{{ __('menu.Inscription') }}</a></li>
                                        </ul>
                                    </li>
                                @endguest

                                @auth
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                            {{ __('menu.Bonjour') }} {{ Auth::user()->pseudo }}
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="{{ route('myaccount') }}">{{ __('menu.Profil') }}</a></li>

                                            <li><a class="dropdown-item text-danger"
                                                    href="{{ route('logout') }}">{{ __('menu.Logout') }}</a></li>
                                        </ul>
                                    </li>
                                @endauth

                                {{-- Sélecteur de langue --}}
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                        <img src="{{ asset('frontend/assets/images/' . App::getLocale() . 'flag.jpg') }}"
                                            style="width: 20px; height: 14px;">
                                        {{ Config::get('languages')[App::getLocale()] }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach (Config::get('languages') as $lang => $language)
                                            @if ($lang != App::getLocale())
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">
                                                        <img src="{{ asset('frontend/assets/images/' . $lang . 'flag.jpg') }}"
                                                            style="width: 20px; height: 14px;">
                                                        {{ $language }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>

                                @auth
                                    @if (auth()->user()->isAdmin())
                                        <li class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                                Admin
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Tableau
                                                        de bord</a></li>
                                            </ul>
                                        </li>
                                    @endif
                                @endauth
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!--/ Navigation end -->
        </header>
        <!--/ Header end -->

        {{-- Contenu principal --}}
        @yield('content')

        {{-- Footer --}}
        <footer id="footer" class="footer bg-overlay">
            <div class="footer-main" style="padding: 40px 0;">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-4 col-md-6 footer-widget footer-about">
                            <h3 class="widget-title">
                                <a href="{{ route('aboutus') }}">{{ __('index.AboutLink') }}</a>
                            </h3>
                            <img loading="lazy" width="200px" class="footer-logo"
                                src="{{ asset('frontend/assets/images/logoh55w.png') }}" alt="My Secret Map">
                            <p>{{ __('index.Aboutme') }}</p>
                            <div class="footer-social">
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/mysecretmap.fr/" aria-label="Facebook">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/my_secret_map/" aria-label="Instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div><!-- Footer social end -->
                        </div><!-- Col end -->

                        <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
                            <h3 class="widget-title">{{ __('index.OT') }}</h3>
                            <div class="working-hours">
                                {{ __('index.OTdesc') }}
                                <br><br>
                                <a class="read-more"
                                    href="mailto:{{ __('index.OTcontact') }}">{{ __('index.OTcontact') }}</a>
                            </div>
                        </div><!-- Col end -->

                        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
                            <h3 class="widget-title">{{ __('index.More') }}</h3>
                            <ul class="list-arrow">
                                <li><a href="{{ route('audioguides') }}">{{ __('index.Audioguide') }}</a></li>
                            </ul>
                        </div><!-- Col end -->
                    </div><!-- Row end -->
                </div><!-- Container end -->
            </div><!-- Footer main end -->

            <div class="copyright" style="padding: 15px 0; background-color: #222; color: #aaa;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="copyright-info">
                                <span>
                                    &copy;
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script>
                                    <strong>My Lovely Planet</strong> — All Rights Reserved
                                </span>
                                <br>
                                <span>{{ __('index.Affiliation') }}</span>
                            </div>
                        </div>
                        <div class="col-md-6 text-md-end mt-3 mt-md-0">
                            <ul class="list-unstyled mb-0">
                                <li style="display:inline; margin-left:10px;"><a
                                        href="{{ route('aboutus') }}">{{ __('index.AboutLink') }}</a></li>
                                <li style="display:inline; margin-left:10px;"><a
                                        href="{{ route('audioguide') }}">{{ __('index.AudioguideLink') }}</a></li>
                                <li style="display:inline; margin-left:10px;"><a href="#">Faq</a></li>
                                <li style="display:inline; margin-left:10px;"><a href="#">Blog</a></li>
                                <li style="display:inline; margin-left:10px;"><a href="#">Pricing</a></li>
                            </ul>
                        </div>
                    </div><!-- Row end -->
                </div><!-- Container end -->
            </div><!-- Copyright end -->
        </footer>
        <!-- Footer end -->

    </div><!-- Body inner end -->

    {{-- Scripts : tu pourras en rajouter via @push('scripts') --}}
    @livewireScripts
    @yield('fullscripts')
    <script>
        @yield('scripts')
    </script>
    @stack('scripts')
</body>

</html>
