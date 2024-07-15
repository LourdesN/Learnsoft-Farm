@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Stored Crop Details</h1>
        <table class="table">
            <tr>
                <th>ID:</th>
                <td>{{ $storedCrop->id }}</td>
            </tr>
            <tr>
                <th>Crop:</th>
                <td>{{ $storedCrop->crop->name }}</td>
            </tr>
            <tr>
                <th>Quantity:</th>
                <td>{{ $storedCrop->quantity }}</td>
            </tr>
            <tr>
                <th>Storage Date:</th>
                <td>{{ $storedCrop->storage_date }}</td>
            </tr>
            <tr>
                <th>Storage Location:</th>
                <td>{{ $storedCrop->storage->location }}</td>
            </tr>
        </table>
        <a href="{{ route('stored_crops.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
