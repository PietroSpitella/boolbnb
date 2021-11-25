@extends('layouts.dashboard')
@section('title', 'Messaggio di ' . $message->fullname)
    
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h2>Nome utente: {{$message->fullname}}</h2>
            </div>
            <div class="card-subtitle">
                <h4>Email mittente: {{$message->email}}</h4>
            </div>
            <div class="card-subtitle">
                <h4>Richiesta informazioni per: {{$message->apartment_title}}</h4>
            </div>
            <div class="card-text">
                <h5>Corpo del messaggio:</h5>
                <p>{{$message->message}}</p>
            </div>
            <div class="card-footer bg-white">
                <a href="mailto:{{$message->email}}?subject={{$message->apartment_title . ' '}}BoolBnB" class="btn btn-primary">Rispondi via email</a>
            </div>
        </div>
    </div>
</div>
@endsection