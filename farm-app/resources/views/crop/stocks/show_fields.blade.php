<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $stock->name }}</p>
</div>

<!-- Quantity Field -->
<div class="col-sm-12">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{{ $stock->quantity }}</p>
</div>

<!-- Stock Type Field -->
<div class="col-sm-12">
    {!! Form::label('stock_type', 'Stock Type:') !!}
    <p>{{ $stock->stock_type }}</p>
</div>

<!-- Price Field -->
<div class="col-sm-12">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $stock->price }} Kshs</p>
</div>

<!-- Supplier Id Field -->
<div class="col-sm-12">
    {!! Form::label('supplier_id', 'Supplier:') !!}
    <p>{{ $stock->supplier->name }}</p>
</div>

