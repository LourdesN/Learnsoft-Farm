<!-- Stock Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock_id', 'Stock:') !!}
    {!! Form::select('stock_id', $stocks->pluck('name', 'id'), null, ['class' => 'form-control', 'required', 'placeholder'=>"Stock"]) !!}
</div>

<!-- Application Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('application_date', 'Application Date:') !!}
    {!! Form::text('application_date', null, ['class' => 'form-control','id'=>'application_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#application_date').datepicker()
    </script>
@endpush

<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Quantity:') !!}
    {!! Form::text('quantity', null, ['class' => 'form-control', 'required', 'maxlength' => 90, 'maxlength' => 90]) !!}
</div>