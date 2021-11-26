{{-- Homepage sito --}}

@extends('layouts.app')
@section('title', 'Homepage')

@section('content_main')
{{-- sezione1: JUMBOTRON --}}
<div class="container mb-5">

    <div class="row align-items-center flex-column">
        <div class="col-auto mx-auto text-center">
            <h1>Live an extraordinary experience</h1>
        </div>
        <div class="col-auto mx-auto text-center">
            <h2>Make the right choice</h2>
        </div>
        <div class="col-auto mx-auto text-center">
            <h3>Find a place to live for a while</h3>
        </div>
    </div>

    {{-- Form di ricerca appartamenti --}}
    <form>
        <div class="form-row">
            <div class="form-group m-0 col">
                <input type="text" class="form-control h-100 form-control-lg" placeholder="where do you want to go?">
            </div>
            <div class="form-group m-0 col">
                <input type="text" class="form-control h-100 form-control-lg" placeholder="check-in">
            </div>
            <div class="form-group m-0 col">
                <input type="text" class="form-control h-100 form-control-lg" placeholder="check-out">
            </div>
            <div class="form-group m-0 col">
                <input type="text" class="form-control h-100 form-control-lg" placeholder="guests">
            </div>
            <button type="submit" class="btn button_register">Search</button>
        </div>
    </form>
</div>

{{-- sezione2 --}}
<div class="container mb-5">
    <div class="row">
        <div class="col-auto">
            <h2>Our Featured Homes</h2>
        </div>
        <div class="col-auto">
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
        <div class="col-4">
            <h2>CARD</h2>
        </div>
        <div class="col-4">
            <h2>CARD</h2>
        </div>
    </div>
</div>
@endsection