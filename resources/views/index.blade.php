{{-- Homepage sito --}}

@extends('layouts.app')
@section('title', 'Homepage')

@section('content_main')
{{-- sezione1: JUMBOTRON --}}
<section id="jumbotron" class="jumbotron jumbotron-fluid position-relative text-white mb-5">
    {{-- Immagine --}}
    {{-- <div class="img-overlay position-absolute">
        <img
            class="img-fluid position-absolute w-100"
            src="https://www.greenme.it/wp-content/uploads/2021/02/tiny-house-ikea.jpg"
            alt=""
        >
    </div> --}}

    <div class="container">
        {{-- Titoli --}}
        <div class="row align-items-center flex-column mb-4">
            <div class="col-auto mx-auto text-center">
                <h2 class="mb-4"><strong>Book & Experience Amazing Places</strong></h2>
                <h5 class="mb-0">Theme For Booking and Rental</h5>
            </div>
        </div>
    
        {{-- Form di ricerca appartamenti --}}
        <form>
            {{-- DA FARE: aggiungere icone fontawesome negli imput con un ::after --}}
            <div class="form-row">
                <div class="col-12 col-lg-4 mb-2">
                    <input
                        name=""
                        type="text"
                        class="form-control form-control-lg"
                        placeholder="where do you want to go?">
                </div>
                <div class="col col-lg mb-2">
                    <input type="text" class="form-control form-control-lg" placeholder="check-in">
                </div>
                <div class="col col-lg mb-2">
                    <input type="text" class="form-control form-control-lg" placeholder="check-out">
                </div>
                <div class="col-12 col-lg mb-2">
                    <input type="text" class="form-control form-control-lg" placeholder="guests">
                </div>
                <div class="col 12 col-lg-auto mb-2">
                    <button type="submit" class="btn button_register h-100">Search</button>
                </div>
            </div>
        </form>
    </div>
</section>

{{-- sezione2: Sponsored --}}
<section id="sponsored" class="">
    <div class="container-lg">
        {{-- Titoli --}}
        <div class="row mb-3">
            <div class="col-12">
                <h3 class="mb-3"><strong>Our Featured Homes</strong></h3>
                <h5 class="mb-0">Hand-picked selection of quality places</h5>
            </div>
        </div>
        
        {{-- Bottoni Prev, Next --}}
        <div class="row mb-3">
            <div class="col text-right">
                <button type="button" class="btn btn-outline-danger btn-sm px-1 py-0 mr-2">Prev</button>
                <button type="button" class="btn btn-outline-danger btn-sm px-1 py-0">Next</button>
            </div>
        </div>
    
        {{-- Cards degli appartamenti sponsorizzati --}}
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    {{-- COLLEGARE I CAMPI AL DATABASE --}}
                    <img src="https://www.greenme.it/wp-content/uploads/2021/02/tiny-house-ikea.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Apartment Name</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Address</h6>
                        <p class="card-text">caratteristics with icons</p>
                        <p class="card-text">Apartment type</p>
                        <p class="card-text">Services whith icons</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://www.greenme.it/wp-content/uploads/2021/02/tiny-house-ikea.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://www.greenme.it/wp-content/uploads/2021/02/tiny-house-ikea.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection