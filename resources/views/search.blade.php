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
        <form action="#" method="GET">
            <div id="top_results" class="col d-flex justify-content-between align-items-center mb-sm-4">
                <div id="results_info">
                    <h1 style="font-weight: 600">Risultati per "input ricerca"</h1>
                    <span>{{ 'Numero appartamenti trovati' . ' ' . count($filter_apartment_service)}}</span>
                </div>
                <div id="select_type" class="mt-lg-5 mt-md-4 mt-sm-4">
                    <label for="type">Tipo di alloggio</label>
                    <select name="type" id="type">
                        <option value=""> Seleziona </option>
                        <option value="appartamento">Appartamento</option>
                        <option value="casa">Casa</option>
                        <option value="stanza">Stanza</option>
                    </select>
                </div>
            </div>

        
            <div id="filters_group" class="col align-items-center my-sm-4">
                <div id="select_filters" class="col d-flex justify-content-center">
                    <div id="rooms_filt" class="text-center">
                        <label for="n_rooms">Stanze</label>
                        <select name="n_rooms" id="n_rooms">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div id="beds_filt" class="text-center">
                        <label for="n_beds">Posti letto</label>
                        <select name="n_beds" id="n_beds">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    {{-- 
                    <div id="distance_filt" class="text-center">
                        <label for="distance_range">Ampiezza raggio</label>
                        <select name="distance_range" id="distance_range">
                            <option value="">20km</option>
                            <option value="apartment">50km</option>
                            <option value="house">75km</option>
                            <option value="room">100km</option>
                        </select>
                    </div>
                    --}}
                </div>
                <div id="button_filters" class="col my-sm-4">
                    {{--
                    <form action="#" method="GET">
                    --}}
                        @foreach ($services as $service)
                            <ul class="pl-0 d-inline-block"> 
                                <li>
                                    <label for="{{$service['id']}}"></label>
                                    <input type="checkbox"
                                    name="id[]"
                                    value="{{($service['id'])}}"
                                    
                                    >
                                    <i class="{{$service['icon']}}"></i>
                                </li> 
                            </ul>
                        @endforeach
                        <button type="submit">Filtra</button>
                    {{--  
                    </form>
                    --}}
                </div>

            </div>
            
        </form>
        {{--Stampa appartamenti filtrati in base ai servizi--}}
        @if(count($filter_apartment_service) > 0 )
            <div class="row mt-4">
                @foreach ($filter_apartment_service as $apartment)
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img src="{{$apartment->image}}" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">{{$apartment->title}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{$apartment->city}}</h6>
                                <p class="card-text">{{$apartment->description}}</p>
                                <p class="card-text">
                                    <i class="{{$apartment->icon}}"></i>
                                    {{$apartment->name}}
                                </p>
                                <a href="{{route('apartments.show', $apartment->id)}}" class="card-link">Visualizza</a>
                            </div>
                        </div>                    
                    </div>
                @endforeach
            </div>
        @else
            <h1>Non ci sono appartamenti</h1>
        @endif
    </div>
@endsection