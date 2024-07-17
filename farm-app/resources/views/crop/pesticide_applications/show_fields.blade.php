<!-- Stock Id Field -->
<div class="col-sm-12">
    {!! Form::label('stock_id', 'Stock Id:') !!}
    <p>{{ $pesticideApplication->stock->name }}</p>
</div>

<!-- Application Date Field -->
<div class="col-sm-12">
    {!! Form::label('application_date', 'Application Date:') !!}
    <p>{{ $pesticideApplication->application_date }}</p>
</div>

<!-- Quantity Field -->
<div class="col-sm-12">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{{ $pesticideApplication->quantity }}</p>
</div>

