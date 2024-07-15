@extends('layouts.app')

@section('content')
<style>
    h1{
        font-family: Georgia;
    }
</style>
    <div class="container">
        <h1 class="text-center">Stored Crops</h1>
        <div class="mb-3">
            <a href="{{ route('stored_crops.create') }}" class="btn btn-primary" style="float:right;">Create New Stored Crop</a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Crop</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Storage Date</th>
                    <th scope="col">Storage location</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($storedCrops as $storedCrop)
                    <tr>
                        <td>{{ $storedCrop->id }}</td>
                        <td>{{ $storedCrop->crop->name }}</td>
                        <td>{{ $storedCrop->quantity }}</td>
                        <td>{{ $storedCrop->storage_date }}</td>
                        <td>{{ $storedCrop->storage->location}}</td>
                        <td>
                            <a href="{{ route('stored_crops.show', $storedCrop->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('stored_crops.edit', $storedCrop->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('stored_crops.destroy', $storedCrop->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this stored crop?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
