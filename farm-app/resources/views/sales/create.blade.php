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
    background-color: #00755E;
    border-radius:2%;
    }
</style>
    <div class="container">
        <h1 class="text-center">Create Sale</h1>
        <form action="{{ route('sales.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="stored_crops_id" class="form-label mt-4">Stored Crop:</label>
                <select class="form-control" id="stored_crops_id" name="stored_crops_id" required>
                    <option selected disabled>Select Stored Crop</option>
                    @foreach ($storedCrops as $storedCrop)
                        <option value="{{ $storedCrop->id }}">{{ $storedCrop->crop->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="customer_id" class="form-label">Customer:</label>
                <select class="form-control" id="customer_id" name="customer_id" required>
                    <option selected disabled>Select Customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->full_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="sales_date" class="form-label">Sales Date:</label>
                <input type="date" class="form-control" id="sales_date" name="sales_date" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <div class="mb-3">
                <label for="price_per_unit" class="form-label">Price Per Unit:</label>
                <input type="number" step="0.01" class="form-control" id="price_per_unit" name="price_per_unit" required>
            </div>
            <div class="mb-3">
                <label for="total_price" class="form-label">Total Price:</label>
                <input type="number" step="0.01" class="form-control" id="total_price" name="total_price" required>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Submit</button>
        </form>
    </div>
@endsection
