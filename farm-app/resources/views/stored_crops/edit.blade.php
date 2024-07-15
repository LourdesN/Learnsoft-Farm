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
        <h1>Edit Stored Crop</h1>
        <form action="{{ route('stored_crops.update', $storedCrop->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="crop_id" class="form-label">Crop:</label>
                <select class="form-control" id="crop_id" name="crop_id" required>
                    @foreach ($crops as $crop)
                        <option value="{{ $crop->id }}" {{ $crop->id == $storedCrop->crop_id ? 'selected' : '' }}>{{ $crop->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $storedCrop->quantity }}" required>
            </div>
            <div class="mb-3">
                <label for="storage_date" class="form-label">Storage Date:</label>
                <input type="date" class="form-control" id="storage_date" name="storage_date" value="{{ $storedCrop->storage_date }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
