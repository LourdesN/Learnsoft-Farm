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
    background-color:#00755E;
    border-radius:2%;
    }
</style>
    <div class="container">
        <h1 class="text-center">Edit Revenue</h1>
        <form action="{{ route('revenues.update', $revenue->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="sale_id" class="form-label mb-3">Sale:</label>
                <select class="form-control" id="sale_id" name="sale_id" required>
                    <option selected disabled>Select Sale</option>
                    @foreach ($sales as $sale)
                        <option value="{{ $sale->id }}" {{ $sale->id == $revenue->sale_id ? 'selected' : '' }}>
                            {{ $sale->id }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount:</label>
                <input type="number" class="form-control" id="amount" name="amount" step="0.01" value="{{ $revenue->amount }}" required>
            </div>
            <div class="mb-3">
                <label for="revenue_date" class="form-label">Revenue Date:</label>
                <input type="date" class="form-control" id="revenue_date" name="revenue_date" value="{{ $revenue->revenue_date }}" required>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Submit</button>
        </form>
    </div>
@endsection
