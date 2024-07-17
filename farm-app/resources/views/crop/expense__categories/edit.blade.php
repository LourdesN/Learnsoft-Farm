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
    h1{
        text-align: center;
        font-family: Georgia;
    }
</style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Edit Expense  Category
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($expenseCategory, ['route' => ['crop.expenseCategories.update', $expenseCategory->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('crop.expense__categories.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-dark']) !!}
                <a href="{{ route('crop.expenseCategories.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
