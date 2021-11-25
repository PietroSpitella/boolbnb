@extends('layouts.dashboard')
@section('title', 'Messaggi')
@section('content')
@if (!empty($user_messages))
<h2>Hai ricevuto i seguenti messaggi:</h2>
    @foreach ($user_messages as $user_message)
        <div class="card my-2">
            <div class="card-body">
                <div class="card-title">{{$user_message->fullname}}</div>
                <div class="card-subtitle">{{$user_message->apartment_title}}</div>
            </div>
            <div class="card-body">
                <a href="{{route('host.show-message', $user_message->id)}}" class="btn btn-primary">Leggi</a>
            </div>
        </div>
    @endforeach
@else
        <h2>Nessun Messaggio Ricevuto</h2>
@endif

        
@endsection