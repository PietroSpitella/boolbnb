{{-- Creazione appartamenti --}}
@extends('layouts.dashboard')
@section('title', 'New Apartment')
    
@section('content')
<form action="{{ route('host.apartments.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <h1>Create Post</h1>
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Add Title">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="type" class="form-label">Type</label>
        <select name="type" id="type">
            <option value=""> -- Select -- </option>
            <option value=""> Apartment </option>
            <option value=""> Room </option>
        </select>
    </div>
    <div>
        <label for="content" class="form-label">Content</label>
        <textarea name="content" class="form-control" id="content" placeholder="Add content"></textarea>
    </div>
     
    <button type="submit" class="d-block btn btn-primary">Submit</button>
</form>
@endsection