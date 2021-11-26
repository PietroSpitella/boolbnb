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
            <p class="fs-15"><i class="fas fa-map-marker-alt fs-15"></i> {{$apartment->city}}, {{$apartment->street}}, {{$apartment->house_number}}</p>
            
            <div class="div-bordered text-center mt-3">
                <div class="p-4">
                    <i class="fas fa-home fs-30 color-grey-icon"></i>
                    <p class="fs-15 text-capitalize font-weight-bold">Type {{$apartment->type}}</p>
                </div>
            </div>

            <div class="div-bordered d-flex text-center mb-3">
                    <div class="div-bordered-2 div-bordered-3 div-bordered-4 icon-separation p-4">
                        <i class="fas fa-bed fs-20 color-grey-icon"></i>
                        <p class="fs-15 text-capitalize font-weight-bold">Bedrooms {{$apartment->n_beds}}</p>
                    </div>
                    <div class="div-bordered-3 icon-separation p-4">
                        <i class="fas fa-user-friends fs-20 color-grey-icon"></i>
                        <p class="fs-15 text-capitalize font-weight-bold">Guests {{$apartment->n_guests}}</p>
                    </div>
                    <div class="div-bordered-2 div-bordered-3 div-bordered-4 icon-separation p-4">
                        <i class="far fa-clone fs-20 color-grey-icon"></i>
                        <p class="fs-15 text-capitalize font-weight-bold">Mq {{$apartment->mq}}</p>
                    </div>
            </div>
            <p>Description: {{$apartment->description}}</p>
            <p>pet: {{$apartment->pet}}</p>
            <p>h_checkin: {{$apartment->h_checkin}}</p>
            <p>h_checkout: {{$apartment->h_checkout}}</p>
            <p>price_night: {{$apartment->price_night}}</p>
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