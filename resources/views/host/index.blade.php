{{-- Lista con appartamenti dell'host autenticato --}}
@extends('layouts.dashboard')
@section('title', 'I tuoi appartamenti')
    
@section('content')
<ul>
    @foreach ($apartments as $apartment)
        <li>{{$apartment->title}}</li>
        <a href="{{ route('host.apartments.edit', $apartment['id'])}}" class="btn btn-danger">Modify Post</a>
        <a href="{{ route('host.apartments.show', $apartment['id'])}}" class="btn btn-success">Detail Post</a>

    @endforeach
</ul>
@endsection