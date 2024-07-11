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
        <h1 class="text-center">Edit Supplier</h1>
        <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label mt-3">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $supplier->name }}" required>
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $supplier->phone_number }}" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $supplier->address }}" required>
            </div>
            <div class="mb-3">
                <label for="supplies_type" class="form-label">Supplies Type:</label>
                <input type="text" class="form-control" id="supplies_type" name="supplies_type" value="{{ $supplier->supplies_type }}" required>
            </div>
            <button type="submit" class="btn btn-primary  mb-3">Update</button>
        </form>
    </div>
@endsection
