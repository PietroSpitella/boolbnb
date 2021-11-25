{{-- Pagina di ricerca appartamenti (sarà con vue) --}}
@extends('layouts.app')
@section('title', 'Appartamento')

@section('content')
    <ul>
        @foreach ($apartments as $apartment)
            <li><a href="{{route('apartments.show', $apartment->id)}}">{{$apartment->title}}</a></li>
        @endforeach
    </ul>
@endsection