@extends('layouts.dashboard')
@section('title', 'Advertises')
    
@section('content')
    <form action="{{ route('host.advertises.store')}}"  method="POST">
        @csrf
        @method('POST')
        
        <select name="advertise_id" id="advertise_id">
            @foreach ($advertises as $advertise)
                <option value="{{$advertise['id'] }}">{{$advertise['name'] }}</option>
            @endforeach
        </select>
        <select name="apartment_id" id="">
            @foreach ($apartments as $apartment)
                <option value="{{$apartment->id}}">{{$apartment->title}}</option>
            @endforeach
        </select>
        {{-- Date --}}
        <label for="start_date"></label>
        <input type="date" name="start_date">

        <label for="end_date"></label>
        <input type="date" name="end_date">
        
       
        {{--<input type="text" name="apartment_id" value="{{$apartment[0]->id}}" hidden>--}}
        <button type="submit" class="d-block btn btn-primary">Sono pronto a sponsorizzare</button>
    </form>
@endsection