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
        <h1 class="text-center">Edit Pesticide Application</h1>
        <form action="{{ route('pesticide_applications.update', $pesticideApplication->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="stock_id" class="form-label mt-3">Stock:</label>
                <select class="form-control" id="stock_id" name="stock_id" required>
                    <option selected disabled>Select Stock</option>
                    @foreach ($stocks as $stock)
                        <option value="{{ $stock->id }}" {{ $stock->id == $pesticideApplication->stock_id ? 'selected' : '' }}>
                            {{ $stock->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="application_date" class="form-label">Application Date:</label>
                <input type="date" class="form-control" id="application_date" name="application_date" value="{{ $pesticideApplication->application_date }}" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $pesticideApplication->quantity }}" required>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Submit</button>
        </form>
    </div>
@endsection
