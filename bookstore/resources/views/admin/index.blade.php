@extends('layout_admin.master')
@section('title', 'Bookstore')
@section('content')
<script src="{{URL::asset('resources/js/Chart.js')}}"></script>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Cash deposits</p>
                        <p class="mb-4">To start a blog, think of a topic about and first brainstorm party is ways to write details</p>
                        <div id="cash-deposits-chart-legend" class="d-flex justify-content-center pt-3"></div>
                        <canvas id="myChart" width="400" height="400"></canvas>
                        <script>
                            var ctx = document.getElementById('myChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: [
                                        @foreach($ThongKeSanPhamTheoLoai as $item)
                                        '{{$item->ten_loai_sach}}',
                                        @endforeach
                                    ],
                                    datasets: [{
                                        label: 'Tổng Sản Phẩm Theo Loại',
                                        data: [
                                            @foreach($ThongKeSanPhamTheoLoai as $item)
                                            '{{$item->TSSP}}',
                                            @endforeach
                                        ],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection