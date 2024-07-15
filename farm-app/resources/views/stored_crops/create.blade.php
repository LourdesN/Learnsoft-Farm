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
        <h1 class="text-center">Create Stored Crop</h1>
        <form action="{{ route('stored_crops.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="crop_id" class="form-label">Crop:</label>
                <select class="form-control" id="crop_id" name="crop_id" required>
                    <option selected disabled>Select Crop</option>
                    @foreach ($crops as $crop)
                        <option value="{{ $crop->id }}">{{ $crop->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <div class="mb-3">
                <label for="storage_date" class="form-label">Storage Date:</label>
                <input type="date" class="form-control" id="storage_date" name="storage_date" required>
            </div>
            <div class="mb-3">
                <label for="harvest_id" class="form-label">Harvest:</label>
                <select class="form-control" id="harvest_id" name="harvest_id" required>
                    <option selected disabled>Select Harvest</option>
                    @foreach ($harvests as $harvest)
                        <option value="{{ $harvest->id }}">{{ $harvest->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="storage_id" class="form-label">Storage:</label>
                <select class="form-control" id="storage_id" name="storage_id" required>
                    <option selected disabled>Select Storage</option>
                    @foreach ($storages as $storage)
                        <option value="{{ $storage->id }}">{{ $storage->location }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Submit</button>
        </form>
    </div>
@endsection

