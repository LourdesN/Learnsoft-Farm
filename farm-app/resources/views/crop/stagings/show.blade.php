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
                    <h1 >
Staging Details
                    </h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-success float-right"
                       href="{{ route('crop.stagings.index') }}">
                                                    Back
                                            </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body"  style="background-color: #009150;color:white;">
                <div class="row">
                    @include('crop.stagings.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
