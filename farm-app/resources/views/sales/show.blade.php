@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sale Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><strong>Sale ID:</strong> {{ $sale->id }}</h5>
                <p class="card-text"><strong>Stored Crop:</strong> {{ $sale->storedCrop->crop->name }}</p>
                <p class="card-text"><strong>Customer:</strong> {{ $sale->customer->full_name }}</p>
                <p class="card-text"><strong>Sales Date:</strong> {{ $sale->sales_date }}</p>
                <p class="card-text"><strong>Quantity:</strong> {{ $sale->quantity }}</p>
                <p class="card-text"><strong>Price Per Unit:</strong> {{ $sale->price_per_unit }}</p>
                <p class="card-text"><strong>Total Price:</strong> {{ $sale->total_price }}</p>
                <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('sales.index') }}" class="btn btn-primary">Back to Sales</a>
            </div>
        </div>
    </div>
@endsection
