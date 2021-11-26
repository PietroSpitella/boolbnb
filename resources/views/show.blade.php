{{-- Dettaglio PUBBLICO appartamenti --}}
@extends('layouts.app')
@section('title', $apartment->title)

@section('content')
{{-- @dump($user) --}}
@if (session('sent'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('sent') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-center">
                <img class="apartments-img" src="{{$apartment->image}}" alt="Image inserted">
            </div>
            <p class="fs-25 font-weight-bold">{{$apartment->title}}</p>
            <i class="fas fa-map-marker-alt fs-25"></i>
            <p> {{$apartment->city}}, {{$apartment->street}}, {{$apartment->house_number}}.</p>
            <p>type: {{$apartment->type}} </p>
            <p>description: {{$apartment->description}}</p>
            <p>mq: {{$apartment->mq}}</p>
            <p>n_beds: {{$apartment->n_beds}}</p>
            <p>n_guests: {{$apartment->n_guests}}</p>
            <p>pet: {{$apartment->pet}}</p>
            <p>h_checkin: {{$apartment->h_checkin}}</p>
            <p>h_checkout: {{$apartment->h_checkout}}</p>
            <p>price_night: {{$apartment->price_night}}</p>
            <p>image: {{$apartment->image}}</p>
            <p>visibility: {{$apartment->visibility}}</p>
            <p>city: {{$apartment->city}}</p>
            <p>street: {{$apartment->street}}</p>
            <p>house_number: {{$apartment->house_number}}</p>
     

            <h2>Scrivi un messaggio:</h2>
            <form action="{{route('store-message')}}" method="POST">
                @csrf
                @method('POST')

                <div class="form-group">
                    <label for="fullname">Nome completo:</label>
                    @if (Auth::user())
                        <input type="text" value="{{$user->name . ' ' . $user->surname}}" name="fullname" id="fullname">
                    @else
                        <input type="fullname" name="fullname" id="fullname">
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    @if (Auth::user())
                        <input type="email" value="{{$user->email}}" name="email" id="email">
                    @else
                        <input type="email" name="email" id="email">
                    @endif
                </div>
                <div class="form-group">
                    <label for="message">Testo:</label>
                    <textarea type="textarea" name="message" id="message"></textarea>
                </div>
                <input type="text" name="apartment_id" value="{{$apartment->id}}" hidden>
                <input type="text" name="apartment_title" value="{{$apartment->title}}" hidden>
                <button type="submit">Manda messaggio</button>
            </form>
        </div>
    </div>
</div>
@endsection