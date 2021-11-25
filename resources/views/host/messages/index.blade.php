@extends('layouts.dashboard')
@section('title', 'Messaggi')
@section('content')
@dump($messages)
    <ul>
        @foreach ($messages as $message)
          <li>{{$message->title}}</li>  
        @endforeach
        
    </ul>
@endsection