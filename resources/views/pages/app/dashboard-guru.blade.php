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
            <h1>Dashboard Guru dan Wali Kelas</h1>
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
                        <h4>Data Pelanggaran Terbaru</h4>
                    </div>
                    <div class="card-body">
                        @forelse ($recentViolations as $recentViolation)
                        <ul class="list-unstyled list-unstyled-border">
                            <li class="media">
                                <img class="rounded-circle mr-3" width="50" src="{{ asset('img/avatar/' . ($loop->iteration  % 2 === 1 ? 'avatar-1.png' : 'avatar-3.png')) }}" alt="avatar">
                                <div class="media-body">
                                    <div class="text-primary ml-3 float-right">
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
                                Lihat data !
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Progres Poin Siswa</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                            @forelse ($usersProgress as $userProgress)
                            <li class="media">
                                <img alt="image" class="mr-4 rounded-circle" width="50" src="{{ asset('img/avatar/' . ($loop->iteration  % 2 === 1 ? 'avatar-4.png' : 'avatar-5.png')) }}" }}">
                                <div class="media-body mr-3 ">
                                    <div class="media-title">{{ $userProgress['name'] }}</div>
                                    <div class="text-job text-muted">{{ $userProgress['nisn'] }}</div>
                                </div>
                                <div class="media-progressbar">
                                    @php
                                    $maxPoints = 40;
                                    $progressPercentage = min($userProgress['total_points'] * 100 / $maxPoints, 100);
                                    $isMaxPoints = $userProgress['total_points'] >= $maxPoints;
                                    if ($progressPercentage >= 100) {
                                    $barColorClass = 'bg-danger';
                                    } elseif ($progressPercentage >= 50) {
                                    $barColorClass = 'bg-warning';
                                    } else {
                                    $barColorClass='bg-primary' ;
                                    }
                                    @endphp
                                    <div class="progress-text">{{ $userProgress['total_points'] }}</div>
                                    <div class="progress" data-height="6">
                                        <div class="progress-bar {{ $barColorClass }}" data-width=" {{ ($userProgress['total_points']/40)*100 }}%"></div>
                                    </div>
                                    <div class="progress-text">{{ $progressPercentage }}%</div>
                                </div>
                                <div class="media-cta">
                                    <a href="{{route('recapitulation.index')}}" class="btn btn-outline-primary">Detail</a>
                                </div>
                            </li>
                            @empty
                            <!-- Handle the case when $usersProgress is empty -->
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
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
<script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush