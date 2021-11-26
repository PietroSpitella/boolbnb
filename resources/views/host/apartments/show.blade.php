{{-- Pagina dettaglio appartamento (host) --}}
@extends('layouts.dashboard')
@section('title', 'Page of show')
    
@section('content')
    <h1>{{$apartment->title}}</h1>
    <a href="{{ route('host.apartments.index')}}" class="btn btn-success">Torna ai tuoi appartamenti</a>
@endsection