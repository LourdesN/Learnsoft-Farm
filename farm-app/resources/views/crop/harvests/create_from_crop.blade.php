@extends('layouts.app')

@section('content')
<style>
    h1{
        font-family: Georgia;
        text-align: center;
        font-size: 29px;
    }
    .container{
        background-color:#009150;
        width: 500px;
        height: 350px;
        margin-top: 2%;
    }
</style>
<h1>Create Harvest for {{ $crop->name }}</h1>
<div class="container">
   
    {!! Form::open(['route' => 'harvests.storeFromCrop']) !!}
        {!! Form::hidden('crop_id', $crop->id) !!}
        
        <div class="form-group">
            {!! Form::label('harvest_date', 'Harvest Date', ['style'=>"margin-top:5% ;"])!!}
            {!! Form::text('harvest_date', now()->format('d-m-Y'), ['class' => 'form-control', 'readonly' => true]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('quantity', 'Quantity') !!}
            {!! Form::number('quantity', null, ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('quality', 'Quality') !!}
            {!! Form::text('quality', 'Good', ['class' => 'form-control', 'required']) !!}
        </div>

        {!! Form::submit('Save', ['class' => 'btn btn-dark']) !!}
    {!! Form::close() !!}
</div>
@endsection
