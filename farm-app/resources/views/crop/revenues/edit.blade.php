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
                        Edit Revenue
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($revenue, ['route' => ['crop.revenues.update', $revenue->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('crop.revenues.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-dark']) !!}
                <a href="{{ route('crop.revenues.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
