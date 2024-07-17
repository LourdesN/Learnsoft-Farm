<!-- Crop Field -->
<div class="form-group col-sm-6">
{!! Form::label('crop_id', 'Crop:') !!}
    {!! Form::select('crop_id', $crops->pluck('name', 'id'), null, ['class' => 'form-control', 'required', 'placeholder'=>"Crops"]) !!}
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Quantity:') !!}
    {!! Form::text('quantity', null, ['class' => 'form-control', 'required', 'maxlength' => 90, 'maxlength' => 90]) !!}
</div>

<!-- Storage Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('storage_date', 'Storage Date:') !!}
    {!! Form::Date('storage_date', null, ['class' => 'form-control','id'=>'storage_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#storage_date').datepicker()
    </script>
@endpush

<!-- Storage Field -->
<div class="form-group col-sm-6">
{!! Form::label('storage_id', 'Storage:') !!}
    {!! Form::select('storage_id', $storages->pluck('location', 'id'), null, ['class' => 'form-control', 'required', 'placeholder'=>"Storage"]) !!}
</div>

<!-- Harvest Field -->
<div class="form-group col-sm-6">
{!! Form::label('harvest_id', 'Harvest:') !!}
    {!! Form::select('harvest_id', $harvests->pluck('quality', 'id'), null, ['class' => 'form-control', 'required', 'placeholder'=>"Harvest Quality"]) !!}
</div>