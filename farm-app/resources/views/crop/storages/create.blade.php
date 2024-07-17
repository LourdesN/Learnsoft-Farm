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
                    Create Storages
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'crop.storages.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('crop.storages.fields')
                </div>

            </div>

            <div class="card-footer text-center">
                {!! Form::submit('Save', ['class' => 'btn btn-dark']) !!}
                <a href="{{ route('crop.storages.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
