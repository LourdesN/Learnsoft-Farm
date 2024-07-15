@extends('layouts.app')

@section('content')
<style>
    .form-control{
        margin-left: 5%;
        margin-right: 5%;
        width: 400px;
    }
    .form-label, .btn{
        margin-left: 5%;
    }
    h1{
        font-family: Georgia;
    }
    form{
    width: 500px;
    margin-left: 26%;
    background-color:#008080;
    border-radius:2%;
    }
</style>
    <div class="container">
        <h1>Storage Location Details</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $storage->id }}</td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td>{{ $storage->location }}</td>
                </tr>
                <tr>
                    <th>Capacity</th>
                    <td>{{ $storage->capacity }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('storages.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
