<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BoolBnB</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.15.0/maps/maps.css'>    
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.16.0/maps/maps-web.min.js'></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.15.0/services/services-web.min.js"></script>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
</head>
<body>
    <div id="vue">
        {{-- NAVBAR --}}
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                    <router-link class="navbar-brand col-sm-3 col-md-3 mr-0 mw-25 d-none d-md-block" to="/"><img src="{{asset('images/boolbnb-def.png')}}" alt="boolbnb_logo"></router-link>
                    <router-link class="navbar-brand col-sm-3 col-md-3 mr-0 mw-25 d-block d-md-none" to="/"><img src="{{asset('images/favicon.png')}}" alt="boolbnb_logo"></router-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse col-md-6 col-sm-6 justify-content-center" id="navbarScroll">
                    <ul class="navbar-nav mr-2 my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
                    <li class="nav-item {{Request::route()->getName()=='Homepage'? 'active' : 'null'}}">
                        <router-link class="nav-link" to="/">Home</router-link>
                    </li>
                    <li class="nav-item {{Request::route()->getName()=='Discover'? 'active' : 'null'}}">
                        <router-link class="nav-link" to="/discover">Scopri</router-link>
                    </li>
                    <li class="nav-item {{Request::route()->getName()=='About'? 'active' : 'null'}}">
                        <router-link class="nav-link" to="/about">Chi siamo</router-link>
                    </li>

                    </ul>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav my-background-navbar">
                        <!-- Authentication Links -->
                        @guest
                    <li class="nav-item pr-1 h-50 navbar-buttons">
                        <a href="{{route('login')}}" class="button_login p-2 text-decoration-none text-light">
                            Accedi
                        </a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item h-50 navbar-buttons mbr-10 margin-bottom-resp">
                            {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                            <a href="{{route('register')}}" class="button_register p-2 text-decoration-none text-light">
                                Registrati
                            </a>
                        </li>
                    @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('host.home') }}">
                                    Dashboard
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Esci') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
                <div class="collapse navbar-collapse navbar-hamburger" id="navbarSupportedContent">
                    <ul class="navbar-nav my-background-navbar dysplay-none">
                        <!-- Authentication Links -->
                        @guest
                    <li class="nav-item padding-r-10px h-50 navbar-buttons">
                        <a href="{{route('login')}}" class="button_login p-2 text-decoration-none text-light">
                            Accedi
                        </a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item h-50 navbar-buttons mbr-10">
                            {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                            <a href="{{route('register')}}" class="button_register p-2 text-decoration-none text-light">
                                Registrati
                            </a>
                        </li>
                    @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu my-dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('host.home') }}">
                                    Dashboard
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Esci') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <p class="m-0 border-top-resp pt-1">PAGINE</p>
                        <li class="nav-item {{Request::route()->getName()=='Homepage'? 'active' : 'null'}}">
                            <router-link class="nav-link" to="/">Home</router-link>
                        </li>
                        <li class="nav-item {{Request::route()->getName()=='Discover'? 'active' : 'null'}}">
                            <router-link class="nav-link" to="/discover">Scopri</router-link>
                        </li>
                        <li class="nav-item {{Request::route()->getName()=='Discover'? 'active' : 'null'}}">
                            <router-link class="nav-link" to="/about">Chi siamo</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <router-view></router-view>
        </main>


        {{-- FOOTER --}}
        <div class="back-color-black d-flex justify-content-around pt-5">
            <div class="container">
                <div class="row d-flex">
                    <div class="col text-center">
                        <a href="./"><img src="images/boolbnb-def.png" alt="logo"></a>
                    </div>
                    <div class="col text-center">
                        <h2>Site creators</h2>
                        <ul class="list-unstyled">
                            <li><a class="color-white" href="https://www.linkedin.com/in/alberto-gaia/">Alberto Gaia</a></li>
                            <li><a class="color-white" href="https://www.linkedin.com/in/amedeo-pasanisi-88a331185/">Amedeo Pasanisi</a></li>
                            <li><a class="color-white" href="https://www.linkedin.com/in/luciano-marchionna/">Luciano Marchionna</a></li>
                            <li><a class="color-white" href="https://www.linkedin.com/in/pietro-spitella/">Pietro Spitella</a></li>
                            <li><a class="color-white" href="https://www.linkedin.com/in/roberto-martino-86a301163/">Roberto Martino</a></li>
                        </ul>
                    </div>
                    <div class="col text-center">
                        <h2>Other information</h2>
                        <ul class="list-unstyled">
                            <li><a class="color-white" href="./">Home</a></li>
                            <li><a class="color-white" href="./discover">Discover</a></li>
                            <li><a class="color-white" href="./about-us">About Us</a></li>
                            <li><a class="color-white" href="./host/dashboard">Dashboard</a></li>
                            <li><a class="color-white" href="./host/messages">Messages</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/front.js')}}"></script>
</body>
</html>