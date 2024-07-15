@extends('layouts.app')

@section('content')
<style>
    .form-control{
        margin-left: 5%;
        margin-right: 5%;
        width: 400px;
    }
    .form-label, .btn{
        margin-left: 5%;
    }
    h1{
        font-family: Georgia;
    }
    form{
    width: 500px;
    margin-left: 26%;
    background-color:#00755E;
    border-radius:2%;
    }
</style>
    <div class="container">
        <h1 class="text-center">Edit Storage Location</h1>
        <form action="{{ route('storages.update', $storage->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="location" class="form-label">Location:</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $storage->location }}" required>
            </div>
            <div class="mb-3">
                <label for="capacity" class="form-label">Capacity:</label>
                <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $storage->capacity }}" required>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Update</button>
        </form>
    </div>
@endsection
