@extends('layouts.app')

@section('content')
<style>
    h1{
        font-family: Georgia;
    }
</style>
    <div class="container">
        <h1 class="text-center">Revenues</h1>
        <a href="{{ route('revenues.create') }}" class="btn btn-primary mb-3" style="float:right;">Create Revenue</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                {{ $message }}
            </div>
        @endif
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sale</th>
                    <th>Amount</th>
                    <th>Revenue Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($revenues as $revenue)
                    <tr>
                        <td>{{ $revenue->id }}</td>
                        <td>{{ $revenue->sale->id }}</td>
                        <td>{{ $revenue->amount }}</td>
                        <td>{{ $revenue->revenue_date }}</td>
                        <td>
                            <a href="{{ route('revenues.show', $revenue->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('revenues.edit', $revenue->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('revenues.destroy', $revenue->id) }}" method="POST" style="display:inline-block;">
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
