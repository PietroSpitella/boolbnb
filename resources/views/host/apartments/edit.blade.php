{{-- Modifica appartamento --}}
@extends('layouts.dashboard')
@section('title', 'Edit Apartment')

@section('content')
<form action="{{ route('host.apartments.update', $apartment->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h1>Edit the selected apartment</h1>
    <input type="text" value="{{Auth::user()->id}}" hidden name="user_id">
    <div class="py-3">
        <label for="title" class="form-label">Title*</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Add Title" class="@error('title') is-invalid @enderror" value="{{old('title', $apartment->title)}}">
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="pb-3">
        <label for="type" class="form-label">Type</label>
        <select name="type" id="type">
            <option value=""> -- Seleziona -- </option>
            <option value="appartamento"
                {{old("type", $apartment->type) == "appartamento" ? "selected" : null}}
            > 
            Apartment </option>
            {{-- da controllare lo spazio lasciato nel value --}}
            <option value="casa"
                {{old("type",  $apartment->type) == "casa" ? "selected" : null}}
            > Home </option>
            <option value="stanza"
                {{old("type",  $apartment->type) == "stanza" ? "selected" : null}}
            > Room</option>
        </select>
    </div>
    <div class="pb-3">
        <label for="description" class="form-label">Description of apartment*</label>
        <textarea name="description" class="form-control" id="description" placeholder="Add description" class="@error('description') is-invalid @enderror">{!! old('description', $apartment->description) !!}</textarea>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    {{--L'utente può utilizzare le frecce per sceglire il valore ma anche inserirlo, se lo inserisce controllare che metta solo un numero--}}
    <div class="pb-3">
        <label for="mq">Square meters</label>
        <input type="number" id="mq" name="mq" min="30" max="300" placeholder="Add square meters min 30 max 300" value="{{old('mq', $apartment->mq)}}">
    </div>
    <div class="pb-3">
        <label for="n_rooms">Number of rooms*</label>
        <input type="number" id="n_rooms" name="n_rooms" placeholder="Aggiungere numero stanze" class="@error('n_rooms') is-invalid @enderror" value="{{old('n_rooms', $apartment->n_rooms)}}">
        @error('n_rooms')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="pb-3">
        <label for="n_beds">Number of beds*</label>
        <input type="number" id="n_beds" name="n_beds" placeholder="Aggiungere numero letti" class="@error('n_beds') is-invalid @enderror" value="{{old('n_beds', $apartment->n_beds)}}">
        @error('n_beds')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="pb-3">
        <label for="n_baths">Number of baths*</label>
        <input type="number" id="n_baths" name="n_baths" placeholder="Aggiungere numero bagni" class="@error('n_baths') is-invalid @enderror" value="{{old('n_baths', $apartment->n_baths)}}">
        @error('n_baths')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="pb-3">
        <label for="n_guests">Number of guests*</label>
        <input type="number" id="n_guests" name="n_guests" placeholder="Aggiungere numero ospiti" class="@error('n_guests') is-invalid @enderror" value="{{old('n_guests', $apartment->n_guests)}}">
        @error('n_guests')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="pb-3">
        <label>Enter the services offered by your structure</label>
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

    <div class="pb-3">
        <label for="pet">Possibility to bring animals*</label>
        <input type="text" id="pet" name="pet" class="@error('pet') is-invalid @enderror" value="{{old('pet', $apartment->pet)}}">
        @error('pet')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="pb-3">
        <label for="h_checkin">Checkin time*</label>
        <input type="text" id="h_checkin" name="h_checkin" class="@error('h_checkin') is-invalid @enderror" value="{{old('h_checkin', $apartment->h_checkin)}}">
        @error('h_checkin')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="pb-3">
        <label for="h_checkout">Checkout time*</label>
        <input type="text" id="h_checkout" name="h_checkout" class="@error('h_checkout') is-invalid @enderror" value="{{old('h_checkout', $apartment->h_checkout)}}">
        @error('h_checkout')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="price_night">Price per night</label>
        <input type="number" id="price_night" name="price_night" min="30" max="1000" placeholder="Add square meters min 30 max 1.000" value="{{old('price_night', $apartment->price_night)}}">
    </div>
    {{-- Per l'immagine bisogna: modificare il file system, creare un link nella cartella public, inserire l'enctype nel form, utilizzare il metodo Storage::put nel controller --}}
    @if ($apartment->image)
    <div class="img-edit-apartments pb-3">
        <img src="{{ asset('storage/' . $apartment->image)}}" class="img-thumbnail w-100" alt="">
    </div>    
    @endif
    <div class="pb-3">
        <label for="image">Edit the cover image of your apartment*</label>
        <input type="file" id="image" name="image">
    </div>
    
    <div class="pb-3">
        <label for="visibility" class="form-label">Visibility apartment</label>
        <select name="visibility" id="visibility">
            <option value="1"> Make the apartment visible </option>
            <option value="0"
                {{old("visibility", $apartment->visibility) == "casa" ? "selected" : null}}
            > Do not make the apartment visible for the moment </option>
        </select>
    </div>

    <div class="form-group pb-3">
        <label for="search-for-coordinates">Street address*</label>
        <div id="search-field"></div>
    </div>
    <div class="pb-3">
        @error('city')
            <div class="alert alert-danger pt-1">{{ $message }}</div>
        @enderror
        @error('street')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <p>Fields marked with the symbol (*) are required</p>

    <div class="d-flex justify-content-between">
        <button type="submit" class="d-block btn btn-login-register-green">Edit apartment</button>
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
