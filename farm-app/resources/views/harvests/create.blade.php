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
    background-color:#008080;
    border-radius:2%;
    }
</style>
    <div class="container">
        <h1  class="text-center">Create Harvest</h1>
        <form action="{{ route('harvests.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="crop_id" class="form-label mt-3">Crop:</label>
                <select class="form-control" id="crop_id" name="crop_id" required>
                    @foreach ($crops as $crop)
                        <option value="{{ $crop->id }}">{{ $crop->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="harvest_date" class="form-label">Harvest Date:</label>
                <input type="date" class="form-control" id="harvest_date" name="harvest_date" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <div class="mb-3">
                <label for="quality" class="form-label">Quality:</label>
                <input type="text" class="form-control" id="quality" name="quality">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Submit</button>
        </form>
    </div>
@endsection
