{{-- Dettaglio PUBBLICO appartamenti --}}
@extends('layouts.app')
@section('title', $apartment->title)

@section('content_main')
{{-- @dump($user) --}}

{{-- PER CICLARE I SERVIZI:  --}}


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
            <p class="fs-25 font-weight-bold pt-3 m-0">{{$apartment->title}}</p>
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
                    <p class="fs-15 text-capitalize font-weight-bold">Beds {{$apartment->n_beds}}</p>
                </div>
                <div class="div-bordered-2 div-bordered-3 div-bordered-4 icon-separation p-4">
                    <i class="fas fa-door-closed fs-20 color-grey-icon"></i>
                    <p class="fs-15 text-capitalize font-weight-bold">Rooms {{$apartment->n_rooms}}</p>
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

            <h4 class="font-weight-bold">Description </h4>
            <p class="fs-15 pb-3 div-bordered-3">{{$apartment->description}}</p>
            
            <div class="pb-3 div-bordered-3">
                <h4 class="font-weight-bold">Details</h4>
                <div class="details-apartments d-flex justify-content-around">
                    <div class="details-left">
                        <p class="fs-15"><i class="far fa-circle fs-12"></i> ID: {{$apartment->id}}</p>
                        <p class="fs-15"><i class="far fa-circle fs-12"></i> Pet: {{$apartment->pet}}</p>
                        <p class="fs-15"><i class="far fa-circle fs-12"></i> Checkin time: {{$apartment->h_checkin}}</p>
                        <p class="fs-15"><i class="far fa-circle fs-12"></i> Checkout time: {{$apartment->h_checkout}}</p>
                    </div>
                    <div class="details-right">
                        <p class="fs-15"><i class="far fa-circle fs-12"></i> Type: {{$apartment->type}}</p>
                        <p class="fs-15"><i class="far fa-circle fs-12"></i> City: {{$apartment->city}}</p>
                        <p class="fs-15"><i class="far fa-circle fs-12"></i> Street: {{$apartment->street}}</p>
                        <p class="fs-15"><i class="far fa-circle fs-12"></i> House number: {{$apartment->house_number}}</p>
                    </div>
                </div>
            </div>
            <h4 class="font-weight-bold pt-3">Additional Services</h4>
            <div class="additional_services d-flex div-bordered-3 flex-wrap pt-2 pb-3">
                @foreach($apartment->services as $service)
                    <div class="pr-4">
                        <p class="fs-15"><i class="{{$service->icon}} fs-15"></i> {{$service->name}}</p>
                    </div>
                @endforeach
            </div>
            <h4 class="font-weight-bold pt-3">Price</h4> 
            <p class="fs-15 pb-3 div-bordered-3"><i class="fas fa-chevron-right fs-12"></i> Price per night: {{$apartment->price_night}} €</p>
     
            <h2 class="mt-4">Send a message:</h2>
            <form class="mb-4" action="{{route('store-message')}}" method="POST">
                @csrf
                @method('POST')

                <div class="d-flex">
                    <div class="form-group w-50 mr-3 my-3">
                        <label for="fullname">Nome completo:</label>
                        @if (Auth::user())
                            <input class="w-100" type="text" value="{{$user->name . ' ' . $user->surname}}" name="fullname" id="fullname">
                        @else
                            <input class="w-100" type="fullname" name="fullname" id="fullname">
                        @endif
                    </div>

                    <div class="form-group w-50 ml-3 my-3">
                        <label for="email">Email:</label>
                        @if (Auth::user())
                            <input class="w-100" type="email" value="{{$user->email}}" name="email" id="email">
                        @else
                            <input class="w-100" type="email" name="email" id="email">
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="message">Testo:</label>
                    <textarea class="w-100" type="textarea" name="message" id="message"></textarea>
                </div>
                <input type="text" name="apartment_id" value="{{$apartment->id}}" hidden>
                <input type="text" name="apartment_title" value="{{$apartment->title}}" hidden>
                <button class="btn btn-login-register p-2" type="submit">Manda messaggio</button>
            </form>
        </div>
    </div>
</div>
@endsection