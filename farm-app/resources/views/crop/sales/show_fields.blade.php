<!-- Stored Crops Id Field -->
<div class="col-sm-12">
    {!! Form::label('stored_crops_id', 'Stored Crops Id:') !!}
    <p>{{ $sale->stored_crops_id }}</p>
</div>

<!-- Sales Date Field -->
<div class="col-sm-12">
    {!! Form::label('sales_date', 'Sales Date:') !!}
    <p>{{ $sale->sales_date }}</p>
</div>

<!-- Quantity Field -->
<div class="col-sm-12">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{{ $sale->quantity }}</p>
</div>

<!-- Price Per Unit Field -->
<div class="col-sm-12">
    {!! Form::label('price_per_unit', 'Price Per Unit:') !!}
    <p>{{ $sale->price_per_unit }}</p>
</div>

<!-- Total Price Field -->
<div class="col-sm-12">
    {!! Form::label('total_price', 'Total Price:') !!}
    <p>{{ $sale->total_price }}</p>
</div>

<!-- Customer Id Field -->
<div class="col-sm-12">
    {!! Form::label('customer_id', 'Customer Id:') !!}
    <p>{{ $sale->customer_id }}</p>
</div>

