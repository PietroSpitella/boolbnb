@extends('layouts.dashboard')
@section('title', 'Sponsorizza il tuo appartamento')
@section('content')
@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="container">
    <h1>Sponsorizza il tuo appartamento: {{$apartment->title}}</h1>
    <div class="row my-3">
    @foreach ($advertises as $advertise)
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-title">{{$advertise->name}}</div>
                <div class="card-body">Metti in risalto per {{$advertise->duration}} ore</div>
                <div class="card-footer"><a href="{{route('host.apartments.advertise.payment', ['id' => $apartment->id, 'advertise_id'=>$advertise->id])}}" class="btn btn-success">Compra ora per {{$advertise->price}}€!</a></div>
            </div>
        </div>
        @endforeach
    </div>
</div>
    
@endsection