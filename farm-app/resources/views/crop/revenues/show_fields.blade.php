<!-- Sale Id Field -->
<div class="col-sm-12">
    {!! Form::label('sale_id', 'Sale Customer:') !!}
    <p>{{ $revenue->sale->customer->full_name }}</p>
</div>

<!-- Amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $revenue->amount }} Kshs</p>
</div>

<!-- Revenue Date Field -->
<div class="col-sm-12">
    {!! Form::label('revenue_date', 'Revenue Date:') !!}
    <p>{{ $revenue->revenue_date }}</p>
</div>

