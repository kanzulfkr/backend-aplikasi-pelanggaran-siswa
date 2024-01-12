@extends('layouts.app')

@section('title', 'Khs')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>All KHS Mahasiswa</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Khs</a></div>
                    <div class="breadcrumb-item">All Khs</div>
                </div>
            </div>
            <div class="section-body">
                @include('layouts.alert')
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Khs</h4>
                                <div class="section-header-button">
                                    <a href="{{ route('khs.create') }}" class="btn btn-primary">New Khs</a>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET", action="{{ route('khs.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Nama Mahasiswa</th>
                                            <th>Mata Kuliah</th>
                                            <th>Nilai</th>
                                            <th>Grade</th>
                                            <th>Keterangan</th>
                                            <th>Tahun Akademik</th>
                                            <th>Semester</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($khs as $row)
                                            <tr>

                                                <td>
                                                    {{ $row->name }}
                                                </td>
                                                <td>
                                                    {{ $row->title }}
                                                </td>
                                                <td>
                                                    {{ $row->nilai }}
                                                </td>
                                                <td>
                                                    {{ $row->grade }}
                                                </td>
                                                <td>
                                                    {{ $row->keterangan }}
                                                </td>
                                                <td>
                                                    {{ $row->tahun_akademik }}
                                                </td>
                                                <td>
                                                    {{ $row->semester }}
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('khs.edit', $row->id) }}"
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>Edit</a>

                                                        {{-- <form action="{{ route('khs.destroy', $row->id) }}" method="POST"
                                                            class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i>Delete</button>
                                                        </form> --}}

                                                        <button class="btn btn-sm btn-danger btn-icon confirm-delete"
                                                            onclick="deleteConfirmation('{{ route('khs.destroy', $row->id) }}')">
                                                            <i class="fas fa-times"></i>
                                                            Delete
                                                        </button>

                                                        <form id="form-delete"
                                                            action="{{ route('khs.destroy', $row->id) }}" method="POST"
                                                            style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>

                                                    </div>


                                                </td>
                                            </tr>
                                        @endforeach

                                        </tr>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $khs->withQueryString()->links() }}
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
