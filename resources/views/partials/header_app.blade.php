<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand logo" href="{{ route('index') }}">
                <img src="{{asset('images/boolbnb-def.png')}}" class="w-100" alt="BoolBnB logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse bg-light p-2 my-navabar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
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
                @guest
                    <div class="d-none d-lg-flex">
                        <div class="nav-item pr-2">
                        Sei un host?
                        <button type="button" class="button_login p-2" data-toggle="modal" data-target="#exampleModal">
                            Login
                        </button>
                            
                            <div class="modal fade" id="exampleModal" tabindex="99" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg d-flex">
                                    <div class="modal-body-left d-none d-md-block">
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
                        </div>
                        @if (Route::has('register'))
                            <div class="nav-item">
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
                                                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
                                            
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
                                                                            <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname">
                                            
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
                                                                            <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth">
                                            
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
                            </div>
                        @else
                            <div class="nav-item dropdown">
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
                            </div>
                        @endif
                    </div>
                    <div class="d-flex d-lg-none bg-warning">
                        <div class="nav-item pr-2">
                            Sei un host?
                            <a href="{{route('login')}}" class="btn button_login p-2">
                                Login
                            </a>
                        </div>
                        <div class="nav-item">
                            <a href="{{route('register')}}" class="btn button_register p-2">
                                Register
                            </a>
                        </div>
                    </div>
                @endguest
                <div class="d-block d-lg-none">
                    <div class="nav-item">
                        <a href="{{ route('host.home') }}" class="text-reset">
                        Dashboard
                        </a>
                    </div>
                    <div class="nav-item">
                        <a class="text-reset" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>                
                </div>
            </div>
        </nav>
    </div>
</header>