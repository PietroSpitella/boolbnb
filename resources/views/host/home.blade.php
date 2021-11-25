{{-- Pagina utente che fa accesso --}}
@extends('layouts.dashboard')
@section('title', 'Welcome back')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Home</h1>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Accesso effettuato. Inizia a gestire i tuoi appartamenti') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
