@extends('layouts.app')

@section('content')
<style>
    h1{
        font-family: Georgia;
    }
</style>
    <div class="container">
        <h1 class="text-center">Fertilizer Applications</h1>
        <a href="{{ route('fertilizer_applications.create') }}" class="btn btn-primary mb-3"  style="float:right;">Create New Fertilizer Application</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Stock</th>
                    <th>Application Date</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fertilizerApplications as $fertilizerApplication)
                    <tr>
                        <td>{{ $fertilizerApplication->id }}</td>
                        <td>{{ $fertilizerApplication->stock->name }}</td>
                        <td>{{ $fertilizerApplication->application_date }}</td>
                        <td>{{ $fertilizerApplication->quantity }}</td>
                        <td>
                            <a href="{{ route('fertilizer_applications.show', $fertilizerApplication->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('fertilizer_applications.edit', $fertilizerApplication->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('fertilizer_applications.destroy', $fertilizerApplication->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this fertilizer application?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
