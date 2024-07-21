<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => 100]) !!}
</div>

<!-- Crop Categories Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('crop_categories_id', 'Crop Categories:') !!}
    {!! Form::select('crop_categories_id', $cropCategories->pluck('name', 'id'), null, ['class' => 'form-control', 'required', 'placeholder' => 'Crop Categories']) !!}
</div>

<!-- Planting Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('planting_date', 'Planting Date:') !!}
    {!! Form::text('planting_date', null, ['class' => 'form-control', 'id' => 'planting_date', 'required', 'placeholder' => 'dd/mm/yyyy']) !!}
</div>

<!-- Duration Field -->
<div class="form-group col-sm-6">
    {!! Form::label('duration', 'Duration (days):') !!}
    {!! Form::number('duration', null, ['class' => 'form-control', 'id' => 'duration', 'required', 'placeholder' => 'Enter duration in days']) !!}
</div>

<!-- Harvesting Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harvesting_date', 'Expected Harvesting Date:') !!}
    {!! Form::text('harvesting_date', null, ['class' => 'form-control', 'id' => 'harvesting_date', 'required', 'readonly', 'placeholder' => 'dd/mm/yyyy']) !!}
</div>

<!-- Is Harvested Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_harvested', 'Is Harvested:') !!}
    {!! Form::checkbox('is_harvested', 1, null, ['class' => 'form-control']) !!}
</div>





