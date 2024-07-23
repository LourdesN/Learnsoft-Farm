@extends('layouts.app')

@section('content')
<style>
    h1{
        font-family: Georgia;
    }
</style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Stagings</h1>
                </div>
              
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('crop.stagings.table')
        </div>
    </div>

@endsection
