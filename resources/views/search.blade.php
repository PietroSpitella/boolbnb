{{-- Pagina di ricerca appartamenti (sarà con vue) --}}
@extends('layouts.app')
@section('title', 'Appartamenti')

@section('content_main')
    {{-- map --}}
    <div id="my_map">
        <div class="overlay"></div>
        <form>
            <div class="form-row">
                <div class="form-group m-0 col-4">
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
                <button style="z-index: 10" type="submit" class="btn button_register">Search</button>
            </div>
        </form>
    </div>
    <div class="container">
        {{-- list --}}
        <div id="top_results" class="col d-flex justify-content-between align-items-center mb-sm-4">
            <div id="results_info">
                <h1 style="font-weight: 600">Risultati per "input ricerca"</h1>
                <span>12345 Risultati</span>
            </div>
            <div id="select_type" class="mt-lg-5 mt-md-4 mt-sm-4">
                <label for="type_of_place">Tipo di alloggio</label>
                <select name="type_of_place" id="type_of_place">
                    <option value=""> Seleziona </option>
                    <option value="apartment">Appartamento</option>
                    <option value="house">Casa</option>
                    <option value="room">Stanza</option>
                </select>
            </div>
        </div>
        <div id="filters_group" class="col align-items-center my-sm-4">
            <div id="select_filters" class="col d-flex justify-content-center">
                <div id="rooms_filt" class="text-center">
                    <label for="n_of_rooms">Stanze</label>
                    <select name="n_of_rooms" id="n_of_rooms">
                        <option value="">1</option>
                        <option value="apartment">2</option>
                        <option value="house">3</option>
                        <option value="room">4</option>
                    </select>
                </div>
                <div id="beds_filt" class="text-center">
                    <label for="n_of_beds">Posti letto</label>
                    <select name="n_of_beds" id="n_of_beds">
                        <option value="">1</option>
                        <option value="apartment">2</option>
                        <option value="house">3</option>
                        <option value="room">4</option>
                    </select>
                </div>
                <div id="distance_filt" class="text-center">
                    <label for="distance_range">Ampiezza raggio</label>
                    <select name="distance_range" id="distance_range">
                        <option value="">20km</option>
                        <option value="apartment">50km</option>
                        <option value="house">75km</option>
                        <option value="room">100km</option>
                    </select>
                </div>
            </div>
            <div id="button_filters" class="col my-sm-4">
                <ul class="pl-0">
                    {{-- @foreach ($services as $service) --}}
                     {{-- <li><button type="button" onclick="" class="btn btn-outline-dark btn-sm"><i class="{{$service->icon}}"></i></button></li>    --}}
                     <li><button type="button" onclick="" class="btn btn-outline-dark btn-sm"><i class="fas fa-parking"></i></button></li>   
                     <li><button type="button" onclick="" class="btn btn-outline-dark btn-sm"><i class="fas fa-fan"></i></button></li>   
                     <li><button type="button" onclick="" class="btn btn-outline-dark btn-sm"><i class="fas fa-wifi"></i></button></li>   
                     <li><button type="button" onclick="" class="btn btn-outline-dark btn-sm"><i class="fas fa-tv"></i></button></li>   
                     <li><button type="button" onclick="" class="btn btn-outline-dark btn-sm"><i class="fas fa-utensils"></i></button></li>   
                     <li><button type="button" onclick="" class="btn btn-outline-dark btn-sm"><i class="fas fa-wind"></i></button></li>   
                     <li><button type="button" onclick="" class="btn btn-outline-dark btn-sm"><i class="fas fa-swimmer"></i></button></li>   
                     <li><button type="button" onclick="" class="btn btn-outline-dark btn-sm"><i class="fas fa-tty"></i></button></li>   
                    {{-- @endforeach --}}
                </ul>
            </div>
        </div>
        <div class="row mt-4">
            @foreach ($apartments as $apartment)
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <img src="{{$apartment->image}}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{$apartment->title}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$apartment->city}}</h6>
                            <p class="card-text">{{$apartment->description}}</p>
                            <a href="{{route('apartments.show', $apartment->id)}}" class="card-link">Visualizza</a>
                        </div>
                    </div>                    
                </div>
            @endforeach
        </div>
    </div>
@endsection