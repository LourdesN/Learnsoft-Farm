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
                        Edit Sale
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($sale, ['route' => ['crop.sales.update', $sale->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('crop.sales.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-dark']) !!}
                <a href="{{ route('crop.sales.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
    @push('page_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            // Function to calculate total price
            function calculateTotalPrice() {
                var quantity = parseFloat($('#quantity').val()) || 0;
                var pricePerUnit = parseFloat($('#price_per_unit').val()) || 0;
                var totalPrice = quantity * pricePerUnit;

                $('#total_price').val(totalPrice.toFixed(2));
            }

            // Attach event handlers to input fields
            $('#quantity, #price_per_unit').on('input', function() {
                calculateTotalPrice();
            });
        });
    </script>
@endpush
@endsection
