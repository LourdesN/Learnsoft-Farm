<!-- Location Field -->
<div class="col-sm-12">
    {!! Form::label('location', 'Location:') !!}
    <p>{{ $storage->location }}</p>
</div>

<!-- Capacity Field -->
<div class="col-sm-12">
    {!! Form::label('capacity', 'Capacity:') !!}
    <p>{{ $storage->capacity }} Kg</p>
</div>

