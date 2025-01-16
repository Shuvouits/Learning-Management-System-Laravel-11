@extends('backend.master')

@section('content')

<div class="page-content">

    @include('backend.admin.dashboard.box')

    <div class="row">
        @include('backend.admin.dashboard.chart')
       

    </div><!--end row-->



</div>

@endsection

@push('scripts')

<script>
    var ctx = document.getElementById('chart1').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($months->toArray()) !!}, // Month names
            datasets: [
                {
                    label: 'Orders',
                    data: {!! json_encode($orders_data) !!}, // Orders data for each month
                    backgroundColor: 'rgba(0, 140, 255, 0.6)',
                    borderColor: '#008cff',
                    borderWidth: 1
                },
                {
                    label: 'Courses',
                    data: {!! json_encode($courses_data) !!}, // Courses data for each month
                    backgroundColor: 'rgba(253, 53, 80, 0.6)',
                    borderColor: '#fd3550',
                    borderWidth: 1
                }
            ]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    display: true,
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


@endpush
