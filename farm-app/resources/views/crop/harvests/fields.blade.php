<!-- Crop Field -->
<div class="form-group col-sm-6">
{!! Form::label('crop_id', 'Crop:') !!}
    {!! Form::select('crop_id', $crops->pluck('name', 'id'), null, ['class' => 'form-control', 'required', 'placeholder'=>"Crops"]) !!}
</div>

<!-- Harvest Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harvest_date', 'Harvest Date:') !!}
    {!! Form::Date('harvest_date', null, ['class' => 'form-control','id'=>'harvest_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#harvest_date').datepicker()
    </script>
@endpush

<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Quantity:') !!}
    {!! Form::text('quantity', null, ['class' => 'form-control', 'maxlength' => 90, 'maxlength' => 90]) !!}
</div>

<!-- Quality Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quality', 'Quality:') !!}
    {!! Form::text('quality', null, ['class' => 'form-control', 'required', 'maxlength' => 90, 'maxlength' => 90]) !!}
</div>