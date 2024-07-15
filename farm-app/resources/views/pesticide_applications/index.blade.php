@extends('layouts.app')

@section('content')
<style>
    h1{
        font-family: Georgia;
    }
</style>
    <div class="container">
        <h1 class="text-center">Pesticide Applications</h1>
        <a href="{{ route('pesticide_applications.create') }}" class="btn btn-primary mb-3" style="float:right;">Create Pesticide Application</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                {{ $message }}
            </div>
        @endif
        <table class="table table-bordered mt-3">
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
                @foreach ($pesticideApplications as $pesticideApplication)
                    <tr>
                        <td>{{ $pesticideApplication->id }}</td>
                        <td>{{ $pesticideApplication->stock->name }}</td>
                        <td>{{ $pesticideApplication->application_date }}</td>
                        <td>{{ $pesticideApplication->quantity }}</td>
                        <td>
                            <a href="{{ route('pesticide_applications.show', $pesticideApplication->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('pesticide_applications.edit', $pesticideApplication->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('pesticide_applications.destroy', $pesticideApplication->id) }}" method="POST" style="display:inline-block;">
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
