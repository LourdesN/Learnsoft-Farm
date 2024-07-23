<!-- Crop Id Field -->
<div class="col-sm-12">
    {!! Form::label('crop_id', 'Crop Id:') !!}
    <p>{{ $staging->crop->name }}</p>
</div>

<!-- Quantity Field -->
<div class="col-sm-12">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{{ $staging->quantity }} Kg</p>
</div>

