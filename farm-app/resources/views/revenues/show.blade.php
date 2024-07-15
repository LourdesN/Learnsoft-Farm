@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Revenue Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Revenue ID: {{ $revenue->id }}</h5>
                <p class="card-text"><strong>Sale ID:</strong> {{ $revenue->sale->id }}</p>
                <p class="card-text"><strong>Amount:</strong> {{ $revenue->amount }}</p>
                <p class="card-text"><strong>Revenue Date:</strong> {{ $revenue->revenue_date }}</p>
                <a href="{{ route('revenues.edit', $revenue->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('revenues.destroy', $revenue->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('revenues.index') }}" class="btn btn-primary">Back to Revenues</a>
            </div>
        </div>
    </div>
@endsection

