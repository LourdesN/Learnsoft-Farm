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
        <h1 class="text-center">Edit Expense</h1>
        <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="description" class="form-label mt-3">Description:</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $expense->description }}" required>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount:</label>
                <input type="text" class="form-control" id="amount" name="amount" value="{{ $expense->amount }}" required>
            </div>
            <div class="mb-3">
                <label for="expense_date" class="form-label">Expense Date:</label>
                <input type="date" class="form-control" id="expense_date" name="expense_date" value="{{ $expense->expense_date }}" required>
            </div>
            <div class="mb-3">
                <label for="expense_category" class="form-label">Expense Category:</label>
                <input type="text" class="form-control" id="expense_category" name="expense_category" value="{{ $expense->expense_category }}" required>
            </div>
            <button type="submit" class="btn btn-primary  mb-3">Update</button>
        </form>
    </div>
@endsection
