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
        <label for="title" class="form-label">Titolo</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Add Title">
    </div>
    <div>
        <label for="type" class="form-label">Tipologia</label>
        <select name="type" id="type">
            <option value=""> -- Seleziona -- </option>
            <option value="appartamento"> Appartamento </option>
            {{-- da controllare lo spazio lasciato nel value --}}
            <option value="casa intera"> Casa intera </option>
            <option value="stanza"> Stanza</option>
        </select>
    </div>
    <div>
        <label for="description" class="form-label">Descrizione dell'appartamento</label>
        <textarea name="description" class="form-control" id="description" placeholder="Add description"></textarea>
    </div>
    {{--L'utente può utilizzare le frecce per sceglire il valore ma anche inserirlo, se lo inserisce controllare che metta solo un numero--}}
    <div>
        <label for="mq">Metri quadrati</label>
        <input type="number" id="mq" name="mq" min="30" max="300" placeholder="Add square meters min 30 max 300">
    </div>
    <div>
        <label for="n_rooms">Numero stanze</label>
        <input type="number" id="n_rooms" name="n_rooms" min="1" max="5" placeholder="Add square meters min 1 max 5">
    </div>
    <div>
        <label for="n_beds">Numero letti</label>
        <input type="number" id="n_beds" name="n_beds" min="1" max="5" placeholder="Add square meters min 1 max 5">
    </div>
    <div>
        <label for="n_baths">Numero bagni</label>
        <input type="number" id="n_baths" name="n_baths" min="1" max="5" placeholder="Add square meters min 1 max 5">
    </div>
    <div>
        <label for="n_guests">Numero ospiti</label>
        <input type="number" id="n_guests" name="n_guests" min="1" max="5" maxlength="1" placeholder="Add square meters min 1 max 5">
    </div>
    <div>
        <label for="pet" class="form-label">Animali</label>
        <select name="pet" id="pet">
            <option value=""> -- Seleziona -- </option>
            <option value="true"> Certo che sono ammessi </option>
            <option value="false"> Mi dispiace, non sono ammessi gli animali </option>
        </select>
    </div>
    <div>
        <label for="h_checkin">Orario checkin</label>
        <input type="text" id="h_checkin" name="h_checkin">
    </div>
    <div>
        <label for="h_checkout">Orario checkout</label>
        <input type="text" id="h_checkout" name="h_checkout">
    </div>
    <div>
        <label for="price_night">Prezzo per notte</label>
        <input type="number" id="price_night" name="price_night" min="30" max="1000" placeholder="Add square meters min 30 max 1.000">
    </div>
    {{-- Per l'immagine bisogna: modificare il file system, creare un link nella cartella public, inserire l'enctype nel form, utilizzare il metodo Storage::put nel controller --}}
  
    <div>
        <label for="image">Inserisci l'immagine di copertina del tuo appartamento</label>
        <input type="file" id="image" name="image">
    </div>
    
    
    <div>
        <label for="visibility" class="form-label">Visibità appartamento</label>
        <select name="visibility" id="visibility">
            <option value="1"> Rendi visibile l'appartamento </option>
            <option value="0"> Per il momento non rendere visibile l'appartamento </option>
        </select>
    </div>
    
    <div>
        <label for="city">Città</label>
        <input type="text" id="city" name="city" placeholder="Aggiungi la Città">
    </div>
    <div>
        <label for="street">Città</label>
        <input type="text" id="street" name="street" placeholder="Aggiungi la strada">
    </div>
    <div>
        <label for="lat">lat</label>
        <input type="number" id="lat" name="lat" placeholder="Aggiungi 7 numeri, di cui 5 dopo la virgola">
    </div>
    <div>
        <label for="long">long</label>
        <input type="number" id="long" name="long" placeholder="Aggiungi 7 numeri, di cui 5 dopo la virgola">
    </div>
    <div>
        <label for="house_number">long</label>
        <input type="number" id="house_number" name="house_number" placeholder="Aggiungi 7 numeri, di cui 5 dopo la virgola">
    </div>
    <button type="submit" class="d-block btn btn-primary">Sono pronto a registrare l'appartamento</button>
</form>
@endsection