{{-- Layouts per navigazione sito normale --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | BoolBnB</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header>
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand logo" href="{{ route('index') }}">
                        <img src="{{asset('images/boolbnb-def.png')}}" alt="BoolBnB logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarScroll">
                        <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
                          <li class="nav-item {{Request::route()->getName()=='index'? 'active' : 'null'}}">
                            <a class="nav-link" href="{{route('index')}}">Home</a>
                          </li>
                          <li class="nav-item {{Request::route()->getName()=='apartments.index'? 'active' : 'null'}}">
                            <a class="nav-link" href="{{route('apartments.index')}}">Appartamenti</a>
                          </li>
                          <li class="nav-item {{Request::route()->getName()=='about-us'? 'active' : 'null'}}">
                            <a class="nav-link" href="{{url('/about-us')}}">About Us</a>
                          </li>
                        </ul>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                        </ul>
    
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item pr-2">
                                    Sei un host?
                                    <button type="button" class="button_login p-2" data-toggle="modal" data-target="#exampleModal">
                                        Login
                                    </button>
                                      
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg d-flex">
                                            
                                            <div class="modal-body-left">
                                                <img src="{{ asset('images/house1.jpg')}}" alt="">
                                            </div>
                                            <div class="modal-body-right">
                                                <div class="modal-content border-0 rounded-0">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Login</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row justify-content-center">
                                                            <div class="col-md-12">
                                                                <div class="card-body">
                                                                    <form method="POST" action="{{ route('login') }}">
                                                                        @csrf                              
                                                                        <div class="form-group modal-dialog-centered row">
                                                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __   ('E-Mail Address') }}</label>
                                                                        
                                                                                <div class="col-md-8 flex-column">
                                                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                                                    
                                                                                    @error('email')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                        </div>

                                                                        <div class="form-group modal-dialog-centered row">
                                                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                        
                                                                            <div class="col-md-8 flex-column">
                                                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        
                                                                                @error('password')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                        
                                                                        <div class="form-group row">
                                                                            <div class="col-md-6 offset-md-4">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        
                                                                                    <label class="form-check-label" for="remember">
                                                                                        {{ __('Remember Me') }}
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                        
                                                                        <div class="form-group row mb-0"> 
                                                                            <div class="col-md-12 d-flex flex-column">
                                                                                <button type="submit" class="btn-login-register py-2">
                                                                                    {{ __('Login') }}
                                                                                </button>
                                                
                                                                                @if (Route::has('password.request'))
                                                                                    <a class="color-red btn btn-link" href="{{ route('password.request') }}">
                                                                                        {{ __('Forgot Your Password?') }}
                                                                                    </a>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                                        <button type="button" class="button_register p-2" data-toggle="modal" data-target="#exampleModal2">
                                            Register
                                        </button>
                                          
                                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="ModalRegister" aria-hidden="true">
                                            <div class="modal-dialog modal-lg d-flex">
                                                <div class="modal-body-left">
                                                    <img src="{{ asset('images/house2.jpg')}}" alt="">
                                                </div>
                                                <div class="modal-body-right">
                                                    <div class="modal-content border-0 rounded-0">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title font-weight-bold" id="ModalRegister">Register</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row justify-content-center">
                                                                <div class="col-md-12">
                                                                    <div class="card-body">
                                                                        <form method="POST" action="{{ route('register') }}">
                                                                            @csrf
                                                    
                                                                            <div class="form-group modal-dialog-centered row">
                                                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                                    
                                                                                <div class="col-md-8 flex-column">
                                                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                    
                                                                                    @error('name')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group modal-dialog-centered row">
                                                                                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>
                                                    
                                                                                <div class="col-md-8 flex-column">
                                                                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>
                                                    
                                                                                    @error('surname')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group modal-dialog-centered row">
                                                                                <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>
                                                    
                                                                                <div class="col-md-8 flex-column">
                                                                                    <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth" autofocus>
                                                    
                                                                                    @error('date_of_birth')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                    
                                                                            <div class="form-group modal-dialog-centered row">
                                                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                                    
                                                                                <div class="col-md-8 flex-column">
                                                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                    
                                                                                    @error('email')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                    
                                                                            <div class="form-group modal-dialog-centered row">
                                                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                                    
                                                                                <div class="col-md-8 flex-column">
                                                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                    
                                                                                    @error('password')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                    
                                                                            <div class="form-group modal-dialog-centered row">
                                                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                                    
                                                                                <div class="col-md-8 flex-column">
                                                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row mb-0">
                                                                                <div class="col-md-12 d-flex flex-column">
                                                                                    <button type="submit" class="btn-login-register py-2">
                                                                                        {{ __('Register') }}
                                                                                    </button>
                                                                                    <a class="color-red btn btn-link" data-target="#exampleModal" data-dismiss="modal" data-toggle="modal" href="#lost">Do you already have an account? Login!</a>
                                                                                    {{-- reindirizza l'utente nel modale login --}}
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('host.home') }}">
                                        Dashboard
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="py-4">
            @yield('content')
        </main>

        <footer>
        </footer>

    </div>
</body>
</html>
