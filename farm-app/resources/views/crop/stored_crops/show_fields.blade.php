<!-- Crop Id Field -->
<div class="col-sm-12">
    {!! Form::label('crop_id', 'Crop Id:') !!}
    <p>{{ $storedCrop->crop->name }}</p>
</div>

<!-- Quantity Field -->
<div class="col-sm-12">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{{ $storedCrop->quantity }} Kg</p>
</div>

<!-- Storage Date Field -->
<div class="col-sm-12">
    {!! Form::label('storage_date', 'Storage Date:') !!}
    <p>{{ $storedCrop->storage_date }}</p>
</div>

<!-- Storage Id Field -->
<div class="col-sm-12">
    {!! Form::label('storage_id', 'Storage Id:') !!}
    <p>{{ $storedCrop->storage-> location }}</p>
</div>

<!-- Harvest Id Field -->
<div class="col-sm-12">
    {!! Form::label('harvest_id', 'Harvest Id:') !!}
    <p>{{ $storedCrop->harvest_id }}</p>
</div>

