<!-- Stock Type Field -->
<div class="col-sm-12">
    {!! Form::label('stock_type', 'Stock Type:') !!}
    <p>{{ $purchase->stock_type }}</p>
</div>

<!-- Supplier Id Field -->
<div class="col-sm-12">
    {!! Form::label('supplier_id', 'Supplier Id:') !!}
    <p>{{ $purchase->supplier_id }}</p>
</div>

<!-- Purchase Date Field -->
<div class="col-sm-12">
    {!! Form::label('purchase_date', 'Purchase Date:') !!}
    <p>{{ $purchase->purchase_date }}</p>
</div>

<!-- Quantity Field -->
<div class="col-sm-12">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{{ $purchase->quantity }}</p>
</div>

<!-- Total Cost Field -->
<div class="col-sm-12">
    {!! Form::label('total_cost', 'Total Cost:') !!}
    <p>{{ $purchase->total_cost }}</p>
</div>

