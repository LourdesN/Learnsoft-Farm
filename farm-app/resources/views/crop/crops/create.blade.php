@extends('layouts.app')

@section('content')
<style>
    .card {
        background-color: #009150;
    }
    h1 {
        font-family: Georgia;
        text-align: center;
    }
</style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Crops</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('adminlte-templates::common.errors')

        <div class="card">
            {!! Form::open(['route' => 'crop.crops.store']) !!}

            <div class="card-body">
                <div class="row">
                    @include('crop.crops.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-dark']) !!}
                <a href="{{ route('crop.crops.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
    @push('page_scripts')
    <script type="text/javascript">
        function parseDate(dateStr) {
            var parts = dateStr.split('/');
            return new Date(parts[2], parts[1] - 1, parts[0]);
        }

        function formatDate(date) {
            var dd = String(date.getDate()).padStart(2, '0');
            var mm = String(date.getMonth() + 1).padStart(2, '0'); // January is 0!
            var yyyy = date.getFullYear();
            return dd + '/' + mm + '/' + yyyy;
        }

        function calculateHarvestingDate() {
            var plantingDate = $('#planting_date').val();
            var duration = $('#duration').val();

            console.log('Planting Date:', plantingDate);
            console.log('Duration:', duration);

            if (plantingDate && duration) {
                var plantingDateObj = parseDate(plantingDate);
                console.log('Parsed Planting Date:', plantingDateObj);

                plantingDateObj.setDate(plantingDateObj.getDate() + parseInt(duration));
                console.log('Calculated Harvesting Date:', plantingDateObj);

                var harvestingDate = formatDate(plantingDateObj);
                console.log('Formatted Harvesting Date:', harvestingDate);

                $('#harvesting_date').val(harvestingDate);
            }
        }

        $('#planting_date, #duration').on('change', function() {
            calculateHarvestingDate();
        });

        // Initialize date pickers
        $('#planting_date').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });

        $('#harvesting_date').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
    </script>
@endpush
@endsection


