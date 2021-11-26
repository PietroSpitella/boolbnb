{{-- Homepage sito --}}

@extends('layouts.app')
@section('title', 'Homepage')

@section('content')
<div class="container">
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
            <button type="submit" class="btn button_register">Sign in</button>
        </div>
    </form>
</div>
<div class="container">
    <div class="row">
        <div class="col-auto">
            <h2>Our Featured Homes</h2>
        </div>
        <div class="col-auto">
            <h3>Hand-picked selection of quality places</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h2>CARD</h2>
        </div>
        <div class="col">
            <h2>CARD</h2>
        </div>
        <div class="col">
            <h2>CARD</h2>
        </div>
    </div>
</div>
@endsection
