{{-- Lista con appartamenti dell'host autenticato --}}
@extends('layouts.dashboard')
@section('title', 'I tuoi appartamenti')
    
@section('content')
@if (count($apartments) < 1)
    <h2>Non hai ancora nessun appartamento</h2>
    <a href="{{route('host.apartments.create')}}" class="btn btn-primary">Aggiungi il tuo primo appartamento</a>
@else 
    <h2>I miei appartamenti:</h2>
    <ul>
        @foreach ($apartments as $apartment)
            <li>{{$apartment->title}}</li>
            <a href="{{ route('host.apartments.show', $apartment['id'])}}" class="btn btn-success">Detail Post</a>
            <a href="{{ route('host.apartments.edit', $apartment['id'])}}" class="btn btn-warning">Modify Post</a>
            <form class="d-inline confirm-delete-post" method="POST" action="{{ route('host.apartments.destroy', $apartment['id']) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Elimina appartamento</button>
            </form>
        @endforeach
    </ul>
    
@endif
@endsection