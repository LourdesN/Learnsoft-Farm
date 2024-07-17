<!-- Sale Id Field -->
<div class="form-group col-sm-6">
{!! Form::label('Sale_id', 'Sale To:') !!}
    {!! Form::select('harvest_id', $sales->pluck('customer_id', 'id'), null, ['class' => 'form-control', 'required', 'placeholder'=>"Customer"]) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Revenue Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('revenue_date', 'Revenue Date:') !!}
    {!! Form::Date('revenue_date', null, ['class' => 'form-control','id'=>'revenue_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#revenue_date').datepicker()
    </script>
@endpush