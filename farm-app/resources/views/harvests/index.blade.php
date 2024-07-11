@extends('layouts.app')

@section('content')
<style>
    h1{
        font-family: Georgia;
    }
</style>
    <div class="container">
        <h1 class="text-center">Harvests</h1>
        <a href="{{ route('harvests.create') }}" class="btn btn-primary mb-3"  style="float:right;">Create New Harvest</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Crop</th>
                    <th>Harvest Date</th>
                    <th>Quantity</th>
                    <th>Quality</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($harvests as $harvest)
                    <tr>
                        <td>{{ $harvest->id }}</td>
                        <td>{{ $harvest->crop->name }}</td>
                        <td>{{ $harvest->harvest_date }}</td>
                        <td>{{ $harvest->quantity }} Kg</td>
                        <td>{{ $harvest->quality }}</td>
                        <td>
                            <a href="{{ route('harvests.show', $harvest->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('harvests.edit', $harvest->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('harvests.destroy', $harvest->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this harvest?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
