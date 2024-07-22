  <!-- harvested Crops Field -->
  <div class="form-group col-sm-6">
        {!! Form::label('harvest_id', 'Harvested Crop:') !!}
        {!! Form::select('harvest_id', $harvestedCrops->pluck('crop.name', 'id'), null, ['class' => 'form-control', 'required', 'placeholder' => 'Select Harvested Crop']) !!}
</div>

<!-- Sales Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sales_date', 'Sales Date:') !!}
    {!! Form::date('sales_date', null, ['class' => 'form-control', 'id' => 'sales_date', 'max' => now()->format('Y-m-d')]) !!}
</div>


<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Quantity:') !!}
    {!! Form::text('quantity', null, ['class' => 'form-control', 'required', 'maxlength' => 90, 'maxlength' => 90, 'id' => 'quantity']) !!}
</div>

<!-- Price Per Unit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price_per_unit', 'Price Per Unit:') !!}
    {!! Form::number('price_per_unit', null, ['class' => 'form-control', 'required', 'id' => 'price_per_unit']) !!}
</div>

<!-- Total Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_price', 'Total Price:') !!}
    {!! Form::number('total_price', null, ['class' => 'form-control', 'id' => 'total_price', 'readonly']) !!}
</div>

<!-- Customer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_id', 'Customer:') !!}
    {!! Form::select('customer_id', $customers->pluck('full_name', 'id'), null, ['class' => 'form-control', 'required', 'placeholder'=>"Select Customers"]) !!}
</div>