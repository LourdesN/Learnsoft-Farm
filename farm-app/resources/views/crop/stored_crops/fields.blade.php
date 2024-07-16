<!-- Crop Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('crop_id', 'Crop Id:') !!}
    {!! Form::number('crop_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Quantity:') !!}
    {!! Form::text('quantity', null, ['class' => 'form-control', 'required', 'maxlength' => 90, 'maxlength' => 90]) !!}
</div>

<!-- Storage Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('storage_date', 'Storage Date:') !!}
    {!! Form::text('storage_date', null, ['class' => 'form-control','id'=>'storage_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#storage_date').datepicker()
    </script>
@endpush

<!-- Storage Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('storage_id', 'Storage Id:') !!}
    {!! Form::number('storage_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Harvest Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harvest_id', 'Harvest Id:') !!}
    {!! Form::number('harvest_id', null, ['class' => 'form-control', 'required']) !!}
</div>