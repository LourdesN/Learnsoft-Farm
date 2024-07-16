<!-- Sale Id Field -->
<div class="col-sm-12">
    {!! Form::label('sale_id', 'Sale Id:') !!}
    <p>{{ $revenue->sale_id }}</p>
</div>

<!-- Amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $revenue->amount }}</p>
</div>

<!-- Revenue Date Field -->
<div class="col-sm-12">
    {!! Form::label('revenue_date', 'Revenue Date:') !!}
    <p>{{ $revenue->revenue_date }}</p>
</div>

