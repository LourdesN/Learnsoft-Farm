<!-- Location Field -->
<div class="form-group col-sm-6 ">
    {!! Form::label('location', 'Location:') !!}
    {!! Form::text('location', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Capacity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capacity', 'Capacity:') !!}
    {!! Form::text('capacity', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>