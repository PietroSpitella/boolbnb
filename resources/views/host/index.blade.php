{{-- Lista con appartamenti dell'host autenticato --}}
@extends('layouts.dashboard')
@section('title', 'I tuoi appartamenti')
    
@section('content')
<ul>
    @foreach ($apartments as $apartment)
        <li>{{$apartment->title}}</li>
    @endforeach
</ul>
@endsection