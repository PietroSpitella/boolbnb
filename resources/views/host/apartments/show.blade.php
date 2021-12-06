{{-- Pagina dettaglio appartamento (host) --}}
@extends('layouts.dashboard')
@section('title', 'Page of show')
    
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>INFORMATION APARTMENT</h1>
            <div class="col-md-12 p-0 mt-4">
                <p class="fs-20 font-weight-bold">Title: {{$apartment->title}}</p>
                <p class="fs-15 d-flex flex-column">All images inserted: <img class="host-apartments-img my-2" src="{{$apartment->image}}" alt="Image inserted"></p>
                <p class="fs-15">ID: {{$apartment->id}}</p>
                <p class="fs-15">Type: {{$apartment->type}}</p>
                <p class="fs-15">Description: {{$apartment->description}}</p>
                <p class="fs-15">Mq: {{$apartment->mq}}</p>
                <p class="fs-15">Number of beds: {{$apartment->n_beds}}</p>
                <p class="fs-15">Number of rooms: {{$apartment->n_rooms}}</p>
                <p class="fs-15">Number of guests: {{$apartment->n_guests}}</p>
                <p class="fs-15">Servizi aggiuntivi:
                    @foreach($apartment->services as $service)
                        {{($service->name)}}@if($service->name[0]).@else,@endif
                    @endforeach
                </p>
                <p class="fs-15">Pet: {{$apartment->pet}}</p>
                <p class="fs-15">Time checkin: {{$apartment->h_checkin}}</p>
                <p class="fs-15">Time checkout: {{$apartment->h_checkout}}</p>
                <p class="fs-15">Price for night: {{$apartment->price_night}}</p>
                <p class="fs-15">City: {{$apartment->city}}</p>
                <p class="fs-15">Street: {{$apartment->street}}</p>
                <p class="fs-15 mb-4">House number: {{$apartment->house_number}}</p>
                <a href="{{route('host.apartments.index')}}" class="btn btn-login-register p-2">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection