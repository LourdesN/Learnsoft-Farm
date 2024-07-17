<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Crop Categories Id Field -->
<div class="form-group col-sm-6">
{!! Form::label('crop_categories_id', 'Crop Categories:') !!}
    {!! Form::select('crop_categories_id', $cropCategories->pluck('name', 'id'), null, ['class' => 'form-control', 'required', 'placeholder'=>"Crop Categories"]) !!}
</div>

<!-- Planting Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('planting_date', 'Planting Date:') !!}
    {!! Form::text('planting_date', null, ['class' => 'form-control','id'=>'planting_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#planting_date').datepicker()
    </script>
@endpush

<!-- Harvesting Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harvesting_date', 'Harvesting Date:') !!}
    {!! Form::text('harvesting_date', null, ['class' => 'form-control','id'=>'harvesting_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#harvesting_date').datepicker()
    </script>
@endpush