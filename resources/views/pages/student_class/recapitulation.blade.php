@extends('layouts.app')

@section('title', 'Rekapitulasi')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Rekapitulasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Rekapitulasi</a></div>
                <div class="breadcrumb-item">All Rekapitulasi</div>
            </div>
        </div>
        <div class="section-body">
            @include('layouts.alert')
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="classForm" method="GET" action="{{ route('recapitulation.index') }}">
                                <div class="badges">
                                    <ul class="nav nav-pills">
                                        @foreach ($className as $class)
                                        @php
                                        $activeClass = $student_class->firstWhere('CId', $class->id) ? 'active' : '';
                                        @endphp
                                        <li class="nav-item">
                                            <a href="#" class="nav-link {{ $activeClass }}" onclick="updateClassId('{{ $class->id }}')">
                                                {{ is_object($class) ? $class->name : '' }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <input type="hidden" id="classIdInput" name="class_id" value="">
                                </div>
                            </form>
                            <div class="clearfix mb-3"></div>
                            <div class="float-left">
                                <form id="classFormPrint" method="GET" action="{{ route('recapitulation.print') }}" target="_blank">
                                    <div class="badges">
                                        <div class="section-header-button">
                                            <a class="btn btn-warning" onclick="CetakRekapitulasi()" href="#">Cetak Rekapitulasi</a>
                                        </div>
                                    </div>
                                    <input type="hidden" id="classIdInputPrint" name="class_id_print" value="{{$classId}}">
                                </form>
                            </div>
                            <div class="float-right">
                                <form method="GET" action="{{ route('recapitulation.index') }}">
                                    <label for="searchInput" class="sr-only">Search</label>
                                    <div class="input-group">
                                        <input type="hidden" name="class_id" value="{{$classId}}">
                                        <input type="text" class="form-control" id="searchInput" placeholder="Search" name="name">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="clearfix mb-3"></div>
                            <div class="table-responsive">
                                <table class="table-striped table">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Siswa </th>
                                        <th>NISN</th>
                                        <th>Total Pelanggaran</th>
                                        <th style="width: 15%;">Total Poin</th>
                                        <th>Status</th>
                                        <th>
                                            <div class="d-flex justify-content-center">
                                                Rincian </div>
                                        </th>
                                    </tr>
                                    @forelse ($usersData as $userData)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $userData['name'] }}</td>
                                        <td>{{ $userData['nisn'] }}</td>
                                        <td>{{ $userData['violations_total'] }}</td>
                                        <td>
                                            <div class="mb-4">
                                                <div class="font-weight-bold mb-1 float-right">{{ $userData['point_total'] }}</div>
                                                <div class="font-weight-bold mb-1">0</div>
                                                <div class="progress" data-height="3">
                                                    @php
                                                    $percentage = ($userData['point_total'] / 40) * 100;
                                                    @endphp
                                                    <div class="progress-bar" role="progressbar" data-width="{{ $percentage }}%" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $userData['status'] }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($userData['violations'] as $violation)
                                                <li>
                                                    ({{ $violation->created_at }})
                                                    {{ $violation->VTName  }}
                                                </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No Data</td>
                                    </tr>
                                    @endforelse
                                </table>
                            </div>
                            <div class="float-right">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function updateClassId(classId) {
        document.getElementById('classIdInput').value = classId;
        document.getElementById('classForm').submit();
    }

    function CetakRekapitulasi() {
        document.getElementById('classFormPrint').submit();
    }
</script>
@endsection

@push('scripts')

<!-- JS Libraies -->
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/features-posts.js') }}"></script>
<script src="{{ asset('js/page/modules-sweetalert.js') }}"></script>
@endpush