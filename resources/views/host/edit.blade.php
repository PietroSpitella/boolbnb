{{-- Modifica appartamento --}}
@extends('layouts.dashboard')
@section('title', 'Edit Apartment')

@section('content')
<form action="{{ route('host.apartments.update', $apartment->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h1>Aggiungi un nuovo appartamento</h1>
    <input type="text" value="{{Auth::user()->id}}" hidden name="user_id">
    <div class="mb-3">
        <label for="title" class="form-label">Titolo*</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Add Title" class="@error('title') is-invalid @enderror" value="{{old('title', $apartment->title)}}">
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="type" class="form-label">Tipologia</label>
        <select name="type" id="type">
            <option value=""> -- Seleziona -- </option>
            <option value="appartamento"
                {{old("type", $apartment->type) == "appartamento" ? "selected" : null}}
            > 
            Appartamento </option>
            {{-- da controllare lo spazio lasciato nel value --}}
            <option value="casa"
                {{old("type",  $apartment->type) == "casa" ? "selected" : null}}
            > Casa intera </option>
            <option value="stanza"
                {{old("type",  $apartment->type) == "stanza" ? "selected" : null}}
            > Stanza</option>
        </select>
    </div>
    <div>
        <label for="description" class="form-label">Descrizione dell'appartamento*</label>
        <textarea name="description" class="form-control" id="description" placeholder="Add description" class="@error('description') is-invalid @enderror">{!! old('description', $apartment->description) !!}</textarea>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    {{--L'utente può utilizzare le frecce per sceglire il valore ma anche inserirlo, se lo inserisce controllare che metta solo un numero--}}
    <div>
        <label for="mq">Metri quadrati</label>
        <input type="number" id="mq" name="mq" min="30" max="300" placeholder="Add square meters min 30 max 300" value="{{old('mq', $apartment->mq)}}">
    </div>
    <div>
        <label for="n_rooms">Numero stanze*</label>
        <input type="number" id="n_rooms" name="n_rooms" placeholder="Aggiungere numero stanze" class="@error('n_rooms') is-invalid @enderror" value="{{old('n_rooms', $apartment->n_rooms)}}">
        @error('n_rooms')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="n_beds">Numero letti*</label>
        <input type="number" id="n_beds" name="n_beds" placeholder="Aggiungere numero letti" class="@error('n_beds') is-invalid @enderror" value="{{old('n_beds', $apartment->n_beds)}}">
        @error('n_beds')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="n_baths">Numero bagni*</label>
        <input type="number" id="n_baths" name="n_baths" placeholder="Aggiungere numero bagni" class="@error('n_baths') is-invalid @enderror" value="{{old('n_baths', $apartment->n_baths)}}">
        @error('n_baths')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="n_guests">Numero ospiti*</label>
        <input type="number" id="n_guests" name="n_guests" placeholder="Aggiungere numero ospiti" class="@error('n_guests') is-invalid @enderror" value="{{old('n_guests', $apartment->n_guests)}}">
        @error('n_guests')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="pet">Possibilità di portare animali*</label>
        <input type="text" id="pet" name="pet" class="@error('pet') is-invalid @enderror" value="{{old('pet', $apartment->pet)}}">
        @error('pet')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="h_checkin">Orario checkin*</label>
        <input type="text" id="h_checkin" name="h_checkin" class="@error('h_checkin') is-invalid @enderror" value="{{old('h_checkin', $apartment->h_checkin)}}">
        @error('h_checkin')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="h_checkout">Orario checkout*</label>
        <input type="text" id="h_checkout" name="h_checkout" class="@error('h_checkout') is-invalid @enderror" value="{{old('h_checkout', $apartment->h_checkout)}}">
        @error('h_checkout')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="price_night">Prezzo per notte</label>
        <input type="number" id="price_night" name="price_night" min="30" max="1000" placeholder="Add square meters min 30 max 1.000" value="{{old('price_night', $apartment->price_night)}}">
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
            <option value="0"
                {{old("visibility", $apartment->visibility) == "casa" ? "selected" : null}}
            > Per il momento non rendere visibile l'appartamento </option>
        </select>
    </div>

    <div>
        <label for="city">Città*</label>
        <input type="text" id="city" name="city" placeholder="Aggiungi la Città" class="@error('h_checkout') is-invalid @enderror" value="{{old('city', $apartment->city)}}">
        @error('city')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="street">Via*</label>
        <input type="text" id="street" name="street" placeholder="Aggiungi la strada" class="@error('street') is-invalid @enderror" value="{{old('street', $apartment->street)}}">
        @error('street')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="lat">latitudine*</label>
        <input type="number" id="lat" name="lat" placeholder="Aggiungi 7 numeri, di cui 5 dopo la virgola">
    </div>
    <div>
        <label for="long">longitudine*</label>
        <input type="number" id="long" name="long" placeholder="Aggiungi 7 numeri, di cui 5 dopo la virgola">
    </div>
    <div>
        <label for="house_number">Numero civico*</label>
        <input type="number" id="house_number" name="house_number" placeholder="Aggiungi 7 numeri, di cui 5 dopo la virgola">
    </div>
    <p>I campi contrassegnati con il simbolo (*) sono obbligatori</p>
    <button type="submit" class="d-block btn btn-primary">Modifica appartamento</button>
</form>
@endsection
