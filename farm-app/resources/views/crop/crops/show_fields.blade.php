<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $crop->name }}</p>
</div>

<!-- Crop Categories Id Field -->
<div class="col-sm-12">
    {!! Form::label('crop_categories_id', 'Crop Categories Id:') !!}
    <p>{{ $crop->crop_categories_id}}</p>
</div>

<!-- Planting Date Field -->
<div class="col-sm-12">
    {!! Form::label('planting_date', 'Planting Date:') !!}
    <p>{{ $crop->planting_date }}</p>
</div>

<!-- Harvesting Date Field -->
<div class="col-sm-12">
    {!! Form::label('harvesting_date', 'Harvesting Date:') !!}
    <p>{{ $crop->harvesting_date }}</p>
</div>

