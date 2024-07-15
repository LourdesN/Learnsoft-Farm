@extends('layouts.app')

@section('content')
<style>
    h1{
        font-family: Georgia;
    }
</style>
    <div class="container">
        <h1 class="text-center">Storage Locations</h1>
        <div class="mb-3">
            <a href="{{ route('storages.create') }}" class="btn btn-primary" style="float:right">Add New Storage Location</a>
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
                    <th scope="col">Location</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($storages as $storage)
                    <tr>
                        <td>{{ $storage->id }}</td>
                        <td>{{ $storage->location }}</td>
                        <td>{{ $storage->capacity }}</td>
                        <td>
                            <a href="{{ route('storages.show', $storage->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('storages.edit', $storage->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('storages.destroy', $storage->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this storage location?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
