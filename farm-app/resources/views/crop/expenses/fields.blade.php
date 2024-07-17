<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Expense Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expense_date', 'Expense Date:') !!}
    {!! Form::Date('expense_date', null, ['class' => 'form-control','id'=>'expense_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#expense_date').datepicker()
    </script>
@endpush

<!-- Expense Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expense_category', 'Expense Category:') !!}
    {!! Form::select('expense_category', $expenseCategories->pluck('name', 'id'), null, ['class' => 'form-control', 'required', 'placeholder'=>"Expense Categories"]) !!}
</div>