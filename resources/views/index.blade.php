{{-- Homepage sito --}}
@extends('layouts.app')
@section('title', 'Homepage')

@section('content_main')
{{-- sezione1: JUMBOTRON --}}
<section id="jumbotron" class="jumbotron jumbotron-fluid position-relative text-white mb-5">
    <div class="container">
        {{-- Titoli --}}
        <div class="row align-items-center flex-column mb-4">
            <div class="col-auto mx-auto text-center">
                <h2 class="mb-4"><strong>Scopri nuovi posti e partecipa a esperienze fantastiche!</strong></h2>
                <h5 class="mb-0">Inizia scegliendo la tua prossima destinazione</h5>
            </div>
        </div>
    
        {{-- Form di ricerca appartamenti --}}
        <div class="row">
                {{-- DA FARE: aggiungere icone fontawesome negli imput con un ::after --}}
            <div class="input-group mb-3">
                <input type="text" class="form-control h-100 form-control-lg pl-5" id="input_destination" name="destination" placeholder="Dove Vuoi Andare?" aria-label="Destination" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-danger bg-danger text-light" type="button">Search</button>
                </div>
            </div>
        </div>
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
            {{-- @foreach ($apartments as $apartment) --}}
                <div class="col-md-4 mb-4">
                    <div class="card">
                        {{-- COLLEGARE I CAMPI AL DATABASE --}}
                        <div class="image-gradient position-relative">
                            <a href=""> {{-- {{route('apartments.show', $apartment->id)}} --}}
                                <img src="https://www.greenme.it/wp-content/uploads/2021/02/tiny-house-ikea.jpg"
                                    class="card-img-top"
                                    alt=""
                                >
                            </a>
                            <h5 class="card-price position-absolute text-light">€/Night</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Apartment Title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Address</h6>
                            <i class="fas fa-bed"></i>
                            <i class="fas fa-bath"></i>
                            <i class="fas fa-user"></i>
                            <i class="fas fa-dog"></i>
                            <p class="card-text">Apartment type</p>
                            <i class="fas fa-wifi"></i>
                            <i class="fas fa-tv"></i>
                            <i class="fas fa-fan"></i>
                        </div>
                    </div>
                </div>
            {{-- @endforeach --}}
        </div>
    </div>
</section>
@endsection