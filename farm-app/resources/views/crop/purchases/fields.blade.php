<!-- Stock Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock_type', 'Stock Type:') !!}
    {!! Form::text('stock_type', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Supplier Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('supplier_id', 'Supplier Id:') !!}
    {!! Form::number('supplier_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Purchase Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('purchase_date', 'Purchase Date:') !!}
    {!! Form::text('purchase_date', null, ['class' => 'form-control','id'=>'purchase_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#purchase_date').datepicker()
    </script>
@endpush

<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Quantity:') !!}
    {!! Form::text('quantity', null, ['class' => 'form-control', 'required', 'maxlength' => 90, 'maxlength' => 90]) !!}
</div>

<!-- Total Cost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_cost', 'Total Cost:') !!}
    {!! Form::number('total_cost', null, ['class' => 'form-control', 'required']) !!}
</div>