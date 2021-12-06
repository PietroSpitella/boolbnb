{{-- Modifica appartamento --}}
@extends('layouts.dashboard')
@section('title', 'Edit Apartment')

@section('content')
<form action="{{ route('host.apartments.update', $apartment->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h1>Modifica l'appartamento selezionato</h1>
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
        <label>Inserisci i servizi offerti dalla tua struttura</label>
        @foreach ($services as $service)
            <div>
                @if ($errors->any())
                    <input type="checkbox" 
                    {{in_array($service->id, old('services', [])) ? 'checked' : null}}
                    value="{{ $service['id'] }}" name="services[]" id="{{ 'service' . $service['id'] }}">
                    <label for="{{ 'service' . $service['id'] }}" class="form-check-label">{{ $service['name'] }}</label>
                    <i class="{{ $service['icon'] }}"></i>
                @else
                    <input 
                    {{$apartment->services->contains($service->id) ? 'checked' : null}}
                    value="{{ $service['id'] }}" id="{{ 'service' . $service['id'] }}" type="checkbox" name="services[]" class="form-check-input">
                    <label for="{{ 'service' . $service['id'] }}" class="form-check-label">{{ $service['name'] }}</label>
                    <i class="{{ $service['icon'] }}"></i>
                @endif
            </div>
        @endforeach
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
    @if ($apartment->image)
    <div class="img-edit-apartments">
        <img src="{{ asset('storage/' . $apartment->image)}}" class="img-thumbnail w-100" alt="">
    </div>    
    @endif
    <div>
        <label for="image">Modifca l'immagine di copertina del tuo appartamento*</label>
        <input type="file" id="image" name="image">
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

    <div class="form-group">
        <label for="search-for-coordinates">Indirizzo*</label>
        <div id="search-field"></div>
    </div>
    <div>
        @error('city')
            <div class="alert alert-danger pt-1">{{ $message }}</div>
        @enderror
        @error('street')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <p>I campi contrassegnati con il simbolo (*) sono obbligatori</p>

    <div class="d-flex justify-content-between">
        <button type="submit" class="d-block btn btn-login-register-green">Modifica appartamento</button>
        <a href="{{route('host.apartments.index')}}" class="btn btn-login-register p-2">Back</a>
    </div>
</form>

{{-- <script>
    var options = {
        searchOptions: {
            key: '6pyK2YdKNiLrHrARYvnllho6iAdjMPex',
            language: 'it-IT',
        },
        autocompleteOptions: {
            key: '6pyK2YdKNiLrHrARYvnllho6iAdjMPex',
            language: 'it-IT'
        }
    }
    
    var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
    var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
    document.getElementById('search-field').append(searchBoxHTML);
    
    document.querySelector('input.tt-search-box-input').name = 'street';
    document.querySelector('input.tt-search-box-input').id = 'search-for-coordinates';
    document.querySelector('input.tt-search-box-input').placeholder = 'Indirizzo';
    document.querySelector('input.tt-search-box-input').value = `{{old('street', $apartment->street)}}`;
</script> --}}
@endsection
