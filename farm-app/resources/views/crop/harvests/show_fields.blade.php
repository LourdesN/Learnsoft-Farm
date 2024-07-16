<!-- Crop Id Field -->
<div class="col-sm-12">
    {!! Form::label('crop_id', 'Crop Id:') !!}
    <p>{{ $harvest->crop_id }}</p>
</div>

<!-- Harvest Date Field -->
<div class="col-sm-12">
    {!! Form::label('harvest_date', 'Harvest Date:') !!}
    <p>{{ $harvest->harvest_date }}</p>
</div>

<!-- Quantity Field -->
<div class="col-sm-12">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{{ $harvest->quantity }}</p>
</div>

<!-- Quality Field -->
<div class="col-sm-12">
    {!! Form::label('quality', 'Quality:') !!}
    <p>{{ $harvest->quality }}</p>
</div>

