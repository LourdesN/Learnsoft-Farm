<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $supplier->name }}</p>
</div>

<!-- Phone Number Field -->
<div class="col-sm-12">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    <p>{{ $supplier->phone_number }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $supplier->address }}</p>
</div>

<!-- Supplies Type Field -->
<div class="col-sm-12">
    {!! Form::label('supplies_type', 'Supplies Type:') !!}
    <p>{{ $supplier->supplies_type }}</p>
</div>

