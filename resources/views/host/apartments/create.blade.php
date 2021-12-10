{{-- Creazione appartamenti --}}
@extends('layouts.dashboard')
@section('title', 'New Apartment')

@section('content')
    <div class="container">
        <div class="row  justify-content-center">
            <div class="col-md-10">
                <form action="{{ route('host.apartments.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <h1>ADD A NEW APARTMENT</h1>
                    <input type="text" value="{{Auth::user()->id}}" hidden name="user_id">
                    <div class="mt-3 mb-3">
                        <label for="title" class="form-label">Title*</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Add Title" class="@error('title') is-invalid @enderror" value="{{old('title')}}">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Typology</label>
                        <select name="type" id="type">
                            <option value=""> -- Select -- </option>
                            <option value="appartamento"
                                {{old("type") == "appartamento" ? "selected" : null}}
                            > 
                            Apartment </option>
                            {{-- da controllare lo spazio lasciato nel value --}}
                            <option value="casa"
                                {{old("type") == "casa" ? "selected" : null}}
                            > Home </option>
                            <option value="stanza"
                                {{old("type") == "stanza" ? "selected" : null}}
                            > Room </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description of the apartment*</label>
                        <textarea name="description" class="form-control" id="description" placeholder="Add description" class="@error('description') is-invalid @enderror">{{old('description')}}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{--L'utente può utilizzare le frecce per sceglire il valore ma anche inserirlo, se lo inserisce controllare che metta solo un numero--}}
                    <div class="d-flex align-items-start flex-wrap pt-3 pb-3"> 
                        <div class="mb-3 mr-4">
                            <label for="mq">Square meters</label>
                            <input class="text-center" type="number" id="mq" name="mq" min="30" max="300" placeholder="Add square meters min 30 max 300" value="{{old('mq')}}">
                        </div>
                        <div class="mb-3 mr-4">
                            <label for="n_rooms">Number of rooms*</label>
                            <input class="text-center" type="number" id="n_rooms" name="n_rooms" min="1" placeholder="Aggiungere numero stanze" class="@error('n_rooms') is-invalid @enderror" value="{{old('n_rooms')}}">
                            @error('n_rooms')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 mr-4">
                            <label for="n_beds">Number of beds*</label>
                            <input class="text-center" type="number" id="n_beds" name="n_beds" min="1" placeholder="Aggiungere numero letti" class="@error('n_beds') is-invalid @enderror" value="{{old('n_beds')}}">
                            @error('n_beds')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 mr-4">
                            <label for="n_baths">Number of bathrooms*</label>
                            <input class="text-center" type="number" id="n_baths" name="n_baths" min="1" placeholder="Aggiungere numero bagni" class="@error('n_baths') is-invalid @enderror" value="{{old('n_baths')}}">
                            @error('n_baths')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 mr-4">
                            <label for="n_guests">Number of guests*</label>
                            <input class="text-center" type="number" id="n_guests" name="n_guests" min="1" placeholder="Aggiungere numero ospiti" class="@error('n_guests') is-invalid @enderror" value="{{old('n_guests')}}">
                            @error('n_guests')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-5">
                        <label>Select the additional services offered by your facility</label>
                        <div class="d-flex justify-content-between flex-wrap mt-2">
                            @foreach ($services as $service)
                                <div>
                                    <i class="{{ $service['icon'] }}"></i>
                                    <label for="{{ 'service' . $service['id'] }}" class="form-check-label">{{ $service['name'] }}</label> 
                                    <input type="checkbox" 
                                    {{in_array($service->id, old('services', [])) ? 'checked' : null}}
                                    value="{{ $service['id'] }}" name="services[]" id="{{ 'service' . $service['id'] }}">      
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="mb-3">
                            <label for="pet">Possibility to bring animals*</label>
                            <input type="text" id="pet" name="pet" class="@error('pet') is-invalid @enderror" value="{{old('pet')}}">
                            @error('pet')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
            
                        <div class="mb-3">
                            <label for="h_checkin">Checkin time*</label>
                            <input type="text" id="h_checkin" name="h_checkin" class="@error('h_checkin') is-invalid @enderror" value="{{old('h_checkin')}}">
                            @error('h_checkin')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="h_checkout">Checkout time*</label>
                            <input type="text" id="h_checkout" name="h_checkout" class="@error('h_checkout') is-invalid @enderror" value="{{old('h_checkout')}}">
                            @error('h_checkout')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="price_night">Price per night</label>
                        <input class="w-25 text-center" type="number" id="price_night" name="price_night" min="30" max="1000" placeholder="Add square meters min 30 max 1.000" value="{{old('price_night')}}">
                    </div>
                    {{-- Per l'immagine bisogna: modificare il file system, creare un link nella cartella public, inserire l'enctype nel form, utilizzare il metodo Storage::put nel controller --}}
                
                    <div class="mb-3">
                        <label for="image">Insert the cover image of your apartment*</label>
                        <input type="file" id="image" name="image" class="@error('image') is-invalid @enderror">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="visibility" class="form-label">Visibility apartment</label>
                        <select name="visibility" id="visibility">
                            <option value="1"> Make the apartment visible </option>
                            <option value="0"> Do not make the apartment visible for the moment </option>
                        </select>
                    </div>
            
                    {{-- Inizio autocomplete SearchMap --}}
                    <div class="mb-3">
                        <label  for="search-for-coordinates">Street address*</label>
                        <div id="search-field"></div>
                    </div>
                    <div>
                        @error('address')
                            <div class="alert alert-danger pt-1">{{ $message }}</div>
                        @enderror
                        @error('city')
                            <div class="alert alert-danger pt-1">{{ $message }}</div>
                        @enderror
                        @error('street')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <p>Fields marked with the symbol (*) are required</p>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="d-block btn btn-login-register-green">Register the apartment</button>
                        <a href="{{route('host.apartments.index')}}" class="btn btn-login-register p-2">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection