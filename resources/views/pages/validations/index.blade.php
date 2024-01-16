@extends('layouts.app')

@section('title', 'Validasi Pelanggaran')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Validasi Pelanggaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Validasi Pelanggaran</a></div>
                <div class="breadcrumb-item">All Validasi Pelanggaran</div>
            </div>
        </div>
        <div class="section-body">
            @include('layouts.alert')
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Validasi Pelanggaran</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET" , action="{{ route('validation.index') }}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="keyword">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table-striped table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Pelanggaran</th>
                                            <th>Poin</th>
                                            <th>NISN</th>
                                            <th>Petugas</th>
                                            <th>Catatan</th>
                                            <th>
                                                <div class="d-flex justify-content-center">
                                                    Validasi
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex justify-content-center">
                                                    Action
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($violations as $violation)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $violation->student_name }}</td>
                                            <td>{{ $violation->violation_name }}</td>
                                            <td>{{ $violation->point }}</td>
                                            <td>{{ $violation->nisn }}</td>
                                            <td>{{ $violation->office_name }}</td>
                                            <td>{{ $violation->catatan == null ? '-' : $violation->catatan}}</td>
                                            <td>
                                                <div class="badge badge-pill {{$violation->is_validate ? 'badge-success' : 'badge-warning' }} ">{{$violation->is_validate ? 'Validate' : 'Unvalidate' }}</div>
                                            </td>
                                            <td>
                                                <form action="{{ route('violations.update', $violation->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" class="form-control " name="violations_types_id" value="{{ $violation->violations_types_id }}">
                                                    <input type="hidden" class="form-control " name="student_id" value="{{ $violation->student_id }}">
                                                    <input type="hidden" class="form-control " name="officer_id" value="{{ $violation->officer_id }}">
                                                    <input type="hidden" class="form-control " name="catatan" value="{{ $violation->catatan }}">
                                                    <input type="hidden" class="form-control " name="is_validate" value="1">
                                                    <button class="btn btn-sm btn-primary">Validasi</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center">No Data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
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
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/features-posts.js') }}"></script>
<script src="{{ asset('js/page/modules-sweetalert.js') }}"></script>
@endpush