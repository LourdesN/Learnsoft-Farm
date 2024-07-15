@extends('layouts.app')
@section('content')
<style>
    h1{
        font-family: Georgia;
    }
</style>
    <div class="container">
        <h1 class="text-center">Crops</h1>
        <div class="mb-3" style="float:right;">
            <a href="{{ route('crops.create') }}" class="btn btn-primary">Create New Crop</a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <table class="table table-bordered datatables">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Planting Date</th>
                    <th scope="col">Harvesting Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($crops as $crop)
                    <tr>
                        <td>{{ $crop->name }}</td>
                        <td>{{ $crop->cropCategory->name }}</td>
                        <td>{{ $crop->planting_date }}</td>
                        <td>{{ $crop->harvesting_date }}</td>
                        <td>
                            <a href="{{ route('crops.show', $crop->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('crops.edit', $crop->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('crops.destroy', $crop->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this crop?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection