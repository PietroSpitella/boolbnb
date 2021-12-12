@extends('layouts.app')
@section('title', 'Login')
    
@section('content_main')
<div class="container">
        <div class="modal-dialog modal-lg d-flex">
            
            <div class="modal-body-left">
                <img src="{{ asset('images/house1.jpg')}}" alt="">
            </div>
            <div class="modal-body-right">
                <div class="modal-content border-0 rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Login</h5>
                    </div>
                    <div class="modal-body p-0">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf                              
                                        <div class="form-group modal-dialog-centered row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __   ('E-Mail') }}</label>
                
                                            <div class="col-md-8 modal-dialog-centered flex-column">
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
        
                                            <div class="col-md-8 modal-dialog-centered flex-column">
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
                                                        {{ __('Rimani collegato') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="form-group row mb-0"> 
                                            <div class="col-md-12 d-flex flex-column">
                                                <button type="submit" class="btn-login-register py-2">
                                                    {{ __('Accedi') }}
                                                </button>
                
                                                @if (Route::has('password.request'))
                                                    <a class="color-red btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Password dimenticata?') }}
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
@endsection
