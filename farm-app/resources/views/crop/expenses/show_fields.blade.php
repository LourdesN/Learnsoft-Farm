<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $expense->description }}</p>
</div>

<!-- Amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $expense->amount }} Kshs</p>
</div>

<!-- Expense Date Field -->
<div class="col-sm-12">
    {!! Form::label('expense_date', 'Expense Date:') !!}
    <p>{{ $expense->expense_date }}</p>
</div>

<!-- Expense Category Field -->
<div class="col-sm-12">
    {!! Form::label('expense_category', 'Expense Category:') !!}
    <p>{{ $expense->expense_category }}</p>
</div>

