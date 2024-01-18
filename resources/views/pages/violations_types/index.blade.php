@extends('layouts.app')

@section('title', 'Jenis Pelanggaran')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Jenis Pelanggaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Jenis Pelanggaran</a></div>
                <div class="breadcrumb-item">All Jenis Pelanggaran</div>
            </div>
        </div>
        <div class="section-body">
            @include('layouts.alert')
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Jenis Pelanggaran</h4>
                            <div class="section-header-button">
                                <a href="{{ route('violations-types.create') }}" class="btn btn-primary">Add New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET" , action="{{ route('violations-types.index') }}">
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
                                            <th style="width: 60%;">Jenis Pelanggaran</th>
                                            <th style="width: 10%;">Poin</th>
                                            <th>Tipe</th>
                                            <th style="width: 20%;">
                                                <div class="d-flex justify-content-center">
                                                    Action
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($violations_types as $violationsType)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $violationsType->name }}</td>
                                            <td>{{ $violationsType->point }}</td>
                                            <td>{{ $violationsType->type }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('violations-types.edit', $violationsType->id) }}" class="btn btn-primary btn-action mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <button class="btn btn-danger btn-action" onclick="deleteConfirmation('{{  route('violations-types.destroy', $violationsType->id) }}')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <form id="form-delete" action="{{ route('violations-types.destroy', $violationsType->id) }}" method="POST" style="display: none;">
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
                                {{ $violations_types->withQueryString()->links() }}
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