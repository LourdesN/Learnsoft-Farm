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
</style>
    <div class="container">
        <h1 class="text-center">Create a Crop</h1>
        <form action="{{ route('crops.store') }}" method="POST" style="width: 500px;margin-left: 26%;background-color:#008080;border-radius:2%;">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="crop_categories_id" class="form-label">Category:</label>
                <select class="form-control" id="crop_categories_id" name="crop_categories_id" required>
                    <option selected disabled>Select Category</option>
                    @foreach ($cropCategories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="planting_date" class="form-label">Planting Date:</label>
                <input type="date" class="form-control" id="planting_date" name="planting_date" required>
            </div>
            <div class="mb-3">
                <label for="harvesting_date" class="form-label">Harvesting Date:</label>
                <input type="date" class="form-control" id="harvesting_date" name="harvesting_date" required>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-bottom:5%">Submit</button>
        </form>
    </div>
@endsection


