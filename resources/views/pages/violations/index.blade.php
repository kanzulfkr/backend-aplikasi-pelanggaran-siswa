@extends('layouts.app')

@section('title', 'Data Pelanggaran')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pelanggaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Data Pelanggaran</a></div>
                <div class="breadcrumb-item">All Data Pelanggaran</div>
            </div>
        </div>
        <div class="section-body">
            @include('layouts.alert')
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Pelanggaran</h4>
                            <div class="section-header-button">
                                <a href="{{ route('violations.create') }}" class="btn btn-primary">Add New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET" , action="{{ route('violations.index') }}">
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
                                            <th>Petugas</th>
                                            <th>Catatan</th>
                                            <th>Validasi</th>
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
                                            <td>{{ $violation->office_name }}</td>
                                            <td>{{ $violation->catatan }}</td>
                                            <td>
                                                <div class="badge badge-pill {{$violation->is_validate ? 'badge-success' : 'badge-warning' }}  mt-1 mb-1 mr-2">{{$violation->is_validate ? 'Validate' : 'Unvalidate' }}</div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('violations.edit', $violation->id) }}" class="btn btn-sm btn-info btn-icon  mr-2">
                                                        <i class="fas fa-edit"></i>
                                                        Edit
                                                    </a>
                                                    <button class="btn btn-sm btn-danger btn-icon confirm-delete" onclick="deleteConfirmation('{{ route('violations.destroy', $violation->id) }}')">
                                                        <i class="fas fa-times"></i>
                                                        Delete
                                                    </button>
                                                    <form id="form-delete" action="{{ route('violations.destroy', $violation->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
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
                                {{ $violations->withQueryString()->links() }}
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