@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sales</h1>
        <a href="{{ route('sales.create') }}" class="btn btn-primary">Create Sale</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                {{ $message }}
            </div>
        @endif
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Stored Crop</th>
                    <th>Customer</th>
                    <th>Sales Date</th>
                    <th>Quantity</th>
                    <th>Price Per Unit</th>
                    <th>Total Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->storedCrop->crop->name }}</td>
                        <td>{{ $sale->customer->full_name }}</td>
                        <td>{{ $sale->sales_date }}</td>
                        <td>{{ $sale->quantity }}</td>
                        <td>{{ $sale->price_per_unit }}</td>
                        <td>{{ $sale->total_price }}</td>
                        <td>
                            <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
