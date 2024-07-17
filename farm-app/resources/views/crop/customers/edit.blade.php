@extends('layouts.app')

@section('content')
<style>
    .card{
        background-color:#009150;
    }
    h1{
        font-family: Georgia;
        text-align: center;
    }
</style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Edit Customer
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($customer, ['route' => ['crop.customers.update', $customer->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('crop.customers.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-dark']) !!}
                <a href="{{ route('crop.customers.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
