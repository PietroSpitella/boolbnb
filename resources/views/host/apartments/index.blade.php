{{-- Lista con appartamenti dell'host autenticato --}}
@extends('layouts.dashboard')
@section('title', 'I tuoi appartamenti')
    
@section('content')
@if (count($apartments) < 1)
    <h2>You don't have any apartments yet</h2>
    <a href="{{route('host.apartments.create')}}" class="btn btn-primary">Add your first apartment</a>
@else 
    <h2>My apartments:</h2>
    <ol>
        @foreach ($apartments as $apartment)
            <div class="d-flex my-4 justify-content-between">
                <li class="font-weight-bold">{{$apartment->title}}</li>
                <div>
                    <a href="{{ route('host.apartments.show', $apartment['id'])}}" class="btn btn-success">Detail Post</a>
                    <a href="{{ route('host.apartments.edit', $apartment['id'])}}" class="btn btn-warning">Modify Post</a>
                    <a href="{{ route('host.statistics-page', $apartment['id'])}}" class="btn btn-primary">Statistics</a>
                    <form class="d-inline confirm-delete-post" method="POST" action="{{ route('host.apartments.destroy', $apartment['id']) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Elimina appartamento</button>
                    </form>
                </div>
            </div>
        @endforeach
    </ol>
    
@endif
@endsection