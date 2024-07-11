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
        <h1 class="text-center">Edit Crop Category</h1>
        <form action="{{ route('crop_categories.update', $cropCategory->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 ">
                <label for="name" class="form-label mt-4">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $cropCategory->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Update</button>
        </form>
    </div>
@endsection


