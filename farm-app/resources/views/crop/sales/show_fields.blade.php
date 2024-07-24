<!-- Stored Crops Id Field -->
<div class="col-sm-12">
    {!! Form::label('Harvested Crop', 'Harvested Crops:') !!}
    <p>{{ $sale->harvest->crop->name}}</p>
</div>

<!-- Sales Date Field -->
<div class="col-sm-12">
    {!! Form::label('sales_date', 'Sales Date:') !!}
    <p>{{ $sale->sales_date }}</p>
</div>

<!-- Quantity Field -->
<div class="col-sm-12">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{{ $sale->quantity }} Kg</p>
</div>

<!-- Price Per Unit Field -->
<div class="col-sm-12">
    {!! Form::label('price_per_unit', 'Price Per Unit:') !!}
    <p>{{ $sale->price_per_unit }} Kshs</p>
</div>

<!-- Total Price Field -->
<div class="col-sm-12">
    {!! Form::label('total_price', 'Total Price:') !!}
    <p>{{ $sale->total_price }} Kshs</p>
</div>

<!-- Customer Id Field -->
<div class="col-sm-12">
    {!! Form::label('customer_id', 'Customer:') !!}
    <p>{{ $sale->customer->full_name }}</p>
</div>

