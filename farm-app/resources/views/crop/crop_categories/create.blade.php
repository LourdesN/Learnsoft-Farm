@extends('layouts.app')

@section('content')
<style>
    .card{
        background-color:#009150;
        width:500px;
        margin-left:20%;
    }
    .card-body{
        width:700px;
        margin-left:10%;

    }
</style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="text-center">
                    Create Crop Categories
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'crop.cropCategories.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('crop.crop_categories.fields')
                </div>

            </div>

            <div class="card-footer text-center" >
                {!! Form::submit('Save', ['class' => 'btn btn-dark']) !!}
                <a href="{{ route('crop.cropCategories.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
