<!-- Stock Id Field -->
<div class="col-sm-12">
    {!! Form::label('stock_id', 'Stock Id:') !!}
    <p>{{ $fertilizerApplication->stock->name }}</p>
</div>

<!-- Application Date Field -->
<div class="col-sm-12">
    {!! Form::label('application_date', 'Application Date:') !!}
    <p>{{ $fertilizerApplication->application_date }}</p>
</div>

<!-- Quantity Field -->
<div class="col-sm-12">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{{ $fertilizerApplication->quantity }} kg</p>
</div>

