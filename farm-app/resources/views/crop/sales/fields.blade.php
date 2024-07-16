<!-- Stored Crops Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stored_crops_id', 'Stored Crops Id:') !!}
    {!! Form::number('stored_crops_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Sales Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sales_date', 'Sales Date:') !!}
    {!! Form::text('sales_date', null, ['class' => 'form-control','id'=>'sales_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#sales_date').datepicker()
    </script>
@endpush

<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Quantity:') !!}
    {!! Form::text('quantity', null, ['class' => 'form-control', 'required', 'maxlength' => 90, 'maxlength' => 90]) !!}
</div>

<!-- Price Per Unit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price_per_unit', 'Price Per Unit:') !!}
    {!! Form::number('price_per_unit', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Total Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_price', 'Total Price:') !!}
    {!! Form::number('total_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Customer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_id', 'Customer Id:') !!}
    {!! Form::number('customer_id', null, ['class' => 'form-control', 'required']) !!}
</div>