{{-- Creazione appartamenti --}}
@extends('layouts.dashboard')
@section('title', 'New Apartment')

@section('content')

    <form action="{{ route('host.apartments.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <h1>Aggiungi un nuovo appartamento</h1>
        <input type="text" value="{{Auth::user()->id}}" hidden name="user_id">
        <div class="mb-3">
            <label for="title" class="form-label">Titolo*</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Add Title" class="@error('title') is-invalid @enderror" value="{{old('title')}}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="type" class="form-label">Tipologia</label>
            <select name="type" id="type">
                <option value=""> -- Seleziona -- </option>
                <option value="appartamento"
                    {{old("type") == "appartamento" ? "selected" : null}}
                > 
                Appartamento </option>
                {{-- da controllare lo spazio lasciato nel value --}}
                <option value="casa"
                    {{old("type") == "casa" ? "selected" : null}}
                > Casa intera </option>
                <option value="stanza"
                    {{old("type") == "stanza" ? "selected" : null}}
                > Stanza</option>
            </select>
        </div>
        <div>
            <label for="description" class="form-label">Descrizione dell'appartamento*</label>
            <textarea name="description" class="form-control" id="description" placeholder="Add description" class="@error('description') is-invalid @enderror">{{old('description')}}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        {{--L'utente può utilizzare le frecce per sceglire il valore ma anche inserirlo, se lo inserisce controllare che metta solo un numero--}}
        <div>
            <label for="mq">Metri quadrati</label>
            <input type="number" id="mq" name="mq" min="30" max="300" placeholder="Add square meters min 30 max 300" value="{{old('mq')}}">
        </div>
        <div>
            <label for="n_rooms">Numero stanze*</label>
            <input type="number" id="n_rooms" name="n_rooms" min="1" placeholder="Aggiungere numero stanze" class="@error('n_rooms') is-invalid @enderror" value="{{old('n_rooms')}}">
            @error('n_rooms')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="n_beds">Numero letti*</label>
            <input type="number" id="n_beds" name="n_beds" min="1" placeholder="Aggiungere numero letti" class="@error('n_beds') is-invalid @enderror" value="{{old('n_beds')}}">
            @error('n_beds')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="n_baths">Numero bagni*</label>
            <input type="number" id="n_baths" name="n_baths" min="1" placeholder="Aggiungere numero bagni" class="@error('n_baths') is-invalid @enderror" value="{{old('n_baths')}}">
            @error('n_baths')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="n_guests">Numero ospiti*</label>
            <input type="number" id="n_guests" name="n_guests" min="1" placeholder="Aggiungere numero ospiti" class="@error('n_guests') is-invalid @enderror" value="{{old('n_guests')}}">
            @error('n_guests')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Inserisci i servizi offerti dalla tua struttura</label>
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
        <div>
            <label for="pet">Possibilità di portare animali*</label>
            <input type="text" id="pet" name="pet" class="@error('pet') is-invalid @enderror" value="{{old('pet')}}">
            @error('pet')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="h_checkin">Orario checkin*</label>
            <input type="text" id="h_checkin" name="h_checkin" class="@error('h_checkin') is-invalid @enderror" value="{{old('h_checkin')}}">
            @error('h_checkin')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="h_checkout">Orario checkout*</label>
            <input type="text" id="h_checkout" name="h_checkout" class="@error('h_checkout') is-invalid @enderror" value="{{old('h_checkout')}}">
            @error('h_checkout')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="price_night">Prezzo per notte</label>
            <input type="number" id="price_night" name="price_night" min="30" max="1000" placeholder="Add square meters min 30 max 1.000" value="{{old('price_night')}}">
        </div>
        {{-- Per l'immagine bisogna: modificare il file system, creare un link nella cartella public, inserire l'enctype nel form, utilizzare il metodo Storage::put nel controller --}}
    
        <div>
            <label for="image">Inserisci l'immagine di copertina del tuo appartamento*</label>
            <input type="file" id="image" name="image" class="@error('image') is-invalid @enderror">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div>
            <label for="visibility" class="form-label">Visibità appartamento</label>
            <select name="visibility" id="visibility">
                <option value="1"> Rendi visibile l'appartamento </option>
                <option value="0"> Per il momento non rendere visibile l'appartamento </option>
            </select>
        </div>

        {{-- Inizio autocomplete SearchMap --}}
        <div class="form-group">
            <label for="search-for-coordinates">Indirizzo*</label>
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
        
        <p>I campi contrassegnati con il simbolo (*) sono obbligatori</p>
        <button type="submit" class="d-block btn btn-primary">Sono pronto a registrare l'appartamento</button>
    </form>
@endsection