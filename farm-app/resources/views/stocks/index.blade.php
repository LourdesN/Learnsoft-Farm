@extends('layouts.app')

@section('content')
<style>
    h1{
        font-family: Georgia;
    }
</style>
    <div class="container">
        <h1 class="text-center">Stocks</h1>
        <a href="{{ route('stocks.create') }}" class="btn btn-primary mb-3"  style="float:right;">Create New Stock</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Stock Type</th>
                    <th>Price</th>
                    <th>Supplier</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stocks as $stock)
                    <tr>
                        <td>{{ $stock->id }}</td>
                        <td>{{ $stock->name }}</td>
                        <td>{{ $stock->quantity }}</td>
                        <td>{{ $stock->stock_type }}</td>
                        <td>{{ $stock->price }}</td>
                        <td>{{ $stock->supplier->name }}</td>
                        <td>
                            <a href="{{ route('stocks.show', $stock->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('stocks.edit', $stock->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this stock?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
