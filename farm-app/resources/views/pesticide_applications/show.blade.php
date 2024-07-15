@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Pesticide Application Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pesticide Application ID: {{ $pesticideApplication->id }}</h5>
                <p class="card-text"><strong>Stock:</strong> {{ $pesticideApplication->stock->name }}</p>
                <p class="card-text"><strong>Application Date:</strong> {{ $pesticideApplication->application_date }}</p>
                <p class="card-text"><strong>Quantity:</strong> {{ $pesticideApplication->quantity }}</p>
                <a href="{{ route('pesticide_applications.edit', $pesticideApplication->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('pesticide_applications.destroy', $pesticideApplication->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('pesticide_applications.index') }}" class="btn btn-primary">Back to Pesticide Applications</a>
            </div>
        </div>
    </div>
@endsection
