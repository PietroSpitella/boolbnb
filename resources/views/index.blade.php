{{-- Homepage sito --}}

@extends('layouts.app')
@section('title', 'Homepage')

@section('content_main')
{{-- sezione1: JUMBOTRON --}}
<section id="jumbotron" class="position-relative text-white mb-5">
    {{-- Immagine --}}
    <div class="img-overlay position-absolute"></div>
    <img
        class="img-fluid position-absolute"
        src="https://www.greenme.it/wp-content/uploads/2021/02/tiny-house-ikea.jpg"
        alt=""
    >

    <div class="container">
        {{-- Titoli --}}
        <div class="row align-items-center flex-column mb-4">
            <div class="col-auto mx-auto text-center">
                <h2 class="mb-4">Book & Experience Amazing Places</h2>
                <h5 class="mb-0">Theme For Booking and Rental</h5>
            </div>
        </div>
    
        {{-- Form di ricerca appartamenti --}}
        <div class="row">
            <form class="form-row">
                {{-- DA FARE: aggiungere icone fontawesome negli imput con un ::after --}}
                <div class="form-group m-0 col-4">
                    <input
                        name=""
                        type="text"
                        class="form-control h-100 form-control-lg pl-5"
                        placeholder="where do you want to go?">
                </div>
                <div class="form-group m-0 col">
                    <input type="text" class="form-control h-100 form-control-lg pl-5" placeholder="check-in">
                </div>
                <div class="form-group m-0 col">
                    <input type="text" class="form-control h-100 form-control-lg pl-5" placeholder="check-out">
                </div>
                <div class="form-group m-0 col">
                    <input type="text" class="form-control h-100 form-control-lg pl-5" placeholder="guests">
                </div>
                <button type="submit" class="btn button_register">Search</button>
            </form>
        </div>
    </div>
</section>

{{-- sezione2: Sponsored --}}
<section id="sponsored" class="">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Our Featured Homes</h2>
            </div>
            <div class="col-12">
                <h3>Hand-picked selection of quality places</h3>
            </div>
        </div>
    
        <div class="row justify-content-end mb-3">
            <button type="button" class="btn btn-outline-danger btn-sm px-1 py-0 mr-2">Prev</button>
            <button type="button" class="btn btn-outline-danger btn-sm px-1 py-0">Next</button>
        </div>
    
        {{-- Cards degli appartamenti sponsorizzati --}}
        <div class="row">
            <div class="col-4">
                <h2>CARD</h2>
            </div>
            <div class="col-4">
                <h2>CARD</h2>
            </div>
            <div class="col-4">
                <h2>CARD</h2>
            </div>
            <div class="col-4">
                <h2>CARD</h2>
            </div>
        </div>
    </div>
</section>
@endsection