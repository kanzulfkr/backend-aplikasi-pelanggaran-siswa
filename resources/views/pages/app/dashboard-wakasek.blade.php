@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard Wakasek</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pelanggaran</h4>
                        </div>
                        <div class="card-body">
                            <h5>{{ $totalsData['violationTotal'] }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total siswa dengan data pelanggaran</h4>
                        </div>
                        <div class="card-body">
                            <h5>{{ $totalsData['studentTotal'] }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success ">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pelanggaran Sudah di Validasi</h4>
                        </div>
                        <div class="card-body">
                            <h5>{{ $totalsData['violationValidate'] }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pelanggaran Belum di Validasi</h4>
                        </div>
                        <div class="card-body">
                            <h5>{{ $totalsData['violationUnValidate'] }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Statistik Data Pelanggaran</h4>
                        <div class="card-header-action">
                            <div class="btn-group">
                                <a href="#" class="btn ">Week</a>
                                <a href="#" class="btn btn-primary">Month</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="container"></div>
                        <!-- <canvas id="myChart" height="150"></canvas> -->
                        <div class="statistic-details mt-sm-4">
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 0%</span>
                                <div class="detail-value">{{$todayVio}}</div>
                                <div class="detail-name">Pelanggaran Hari Ini</div>
                            </div>
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>{{$percentageIncrease}}%</span>
                                <div class="detail-value">{{$thisMonthVio}}</div>
                                <div class="detail-name">Pelanggaran Bulan Ini</div>
                            </div>
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>{{$percentageIncreaseYear}}%</span>
                                <div class="detail-value">{{$thisYearVio}}</div>
                                <div class="detail-name">Pelanggaran Tahun Ini</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Kategori Pelanggaran</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart4"></canvas>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Sebaran Kelas</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart3"></canvas>
                    </div>
                </div>
                <!-- <div class="card">
                    <div class="card-header">
                        <h4>Data Pelanggaran Terbaru</h4>
                    </div>
                    <div class="card-body">
                        @forelse ($recentViolations as $recentViolation)
                        <ul class="list-unstyled list-unstyled-border">
                            <li class="media">
                                <img class="rounded-circle mr-3" width="50" src="{{ asset('img/avatar/' . ($loop->iteration  % 2 === 1 ? 'avatar-1.png' : 'avatar-3.png')) }}" alt="avatar">
                                <div class="media-body">
                                    <div class="text-primary text-small ml-3 float-right">
                                        {{ $recentViolation->created_at->locale('id')->diffForHumans(); }}
                                    </div>
                                    <div class="media-title">
                                        {{ $recentViolation->officer->user->name }}
                                        <span class="text-muted" style="font-weight: normal;">telah menambahkan</span>
                                        {{ $recentViolation->student->user->name }}
                                        <span class="text-muted" style="font-weight: normal;">pelanggaran baru.</span>
                                    </div>
                                    <div class="media-sub-title">
                                        <span class="text-small">Catatan : </span>
                                        {{ $recentViolation->catatan }}
                                    </div>
                                </div>
                            </li>
                        </ul> @empty
                        @endforelse
                        <div class="pt-1 pb-1 text-center">
                            <a href="{{route('violations.index')}}" class="btn btn-primary btn-lg btn-round">
                                Lihat Sekarang !
                            </a>
                        </div>
                    </div> -->
            </div>
        </div>
</div>
</section>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
<script>
    "use strict";
    var vioStats = <?php echo json_encode($vioStats) ?>;
    Highcharts.chart('container', {
        title: {
            text: 'Data Pelanggaran Siswa SMA Negeri 1 Madiun'
        },
        subtitle: {
            text: '2023/2024'
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep',
                'Oct', 'Nov', 'Dec'
            ]
        },
        yAxis: {
            title: {
                text: 'Total Pelanggaran'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Pelanggaran',
            data: vioStats
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>
<script>
    "use strict";
    var vioTypesStats = <?php echo json_encode($vioTypesStats) ?>;
    var counts = [];
    var types = [];
    vioTypesStats.forEach(function(item) {
        counts.push(item.count);
        types.push(item.type);
    });
    var ctx = document.getElementById("myChart4").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [{
                data: counts,
                backgroundColor: [
                    '#fc544b', // merah
                    '#6777ef', //biru
                    '#ffa426', // oren
                ],
                label: 'Dataset 1'
            }],
            labels: types,
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
            },
        }
    });
</script>
<script>
    "use strict";
    var violationsByClass = <?php echo json_encode($violationsByClass) ?>;
    var ctx = document.getElementById("myChart3").getContext('2d');

    // Menginisialisasi array untuk data dan label
    var data = [];
    var labels = [];

    // Mengisi data dan label dari violationsByClass
    violationsByClass.forEach(function(item) {
        labels.push(item.name);
        data.push(item.total_violations);
    });
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: data,
                backgroundColor: [
                    '#63ed7a',
                    '#ffa426',
                    '#fc544b',
                    '#6777ef',
                ],
                label: 'Dataset 1'
            }],
            labels: labels,
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
            },
        }
    });
</script>
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
<script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

<!-- Page Specific JS File -->
<!-- <script src="{{ asset('js/page/index-0.js') }}"></script> -->
@endpush