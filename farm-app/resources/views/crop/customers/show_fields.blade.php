<!-- Full Name Field -->
<div class="col-sm-12">
    {!! Form::label('full_name', 'Full Name:') !!}
    <p>{{ $customer->full_name }}</p>
</div>

<!-- Phone Number Field -->
<div class="col-sm-12">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    <p>{{ $customer->phone_number }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $customer->email }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $customer->address }}</p>
</div>

