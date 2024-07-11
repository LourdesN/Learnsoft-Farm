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
        <h1 class="text-center">Edit Stock</h1>
        <form action="{{ route('stocks.update', $stock->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label mt-3">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $stock->name }}" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $stock->quantity }}" required>
            </div>
            <div class="mb-3">
                <label for="stock_type" class="form-label">Stock Type:</label>
                <input type="text" class="form-control" id="stock_type" name="stock_type" value="{{ $stock->stock_type }}" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $stock->price }}" required>
            </div>
            <div class="mb-3">
                <label for="supplier_id" class="form-label">Supplier:</label>
                <select class="form-control" id="supplier_id" name="supplier_id" required>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $supplier->id == $stock->supplier_id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary  mb-3">Update</button>
        </form>
    </div>
@endsection
