@extends('layouts.app')

@section('title', 'Guru')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Guru</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Guru</a></div>
                <div class="breadcrumb-item">Semua Guru</div>
            </div>
        </div>
        <div class="section-body">
            @include('layouts.alert')
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card" {{ $role = auth()->user()->roles }}>
                        <div class="card-header">
                            <h4>Semua Guru</h4>
                            @if ($role == '1')
                            <div class="section-header-button">
                                <a href="{{ route('teachers.create') }}" class="btn btn-primary">Add New</a>
                            </div>
                            @else
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET" , action="{{ route('teachers.index') }}">
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
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Telepon</th>
                                        <th>Jabatan</th>
                                        <th>Alamat</th>
                                        @if ($role == '1')
                                        <th>
                                            <div class="d-flex justify-content-center">
                                                Aksi
                                            </div>
                                        </th>
                                        @else
                                        @endif
                                    </tr>
                                    @forelse ($teachers as $teacher)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $teacher->name }}
                                        </td>
                                        <td>
                                            {{ $teacher->nip }}
                                        </td>
                                        <td>
                                            {{ $teacher->email }}
                                        </td>
                                        <td>
                                            {{ $teacher->gender == 'perempuan' ? 'P' : 'L' }}
                                        </td>
                                        <td>
                                            {{ $teacher->phone }}
                                        </td>
                                        <td>
                                            @foreach (explode(',', $teacher->roles) as $role)
                                            @if ($role == '2')
                                            {{ 'Tata Tertib' }}<br>
                                            @elseif ($role == '3')
                                            {{ 'Wakasek Kesiswaan' }}<br>
                                            @elseif ($role == '4')
                                            {{ 'Wali Kelas' }}<br>
                                            @elseif ($role == '5')
                                            {{ 'Guru' }}<br>
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $teacher->address }}
                                        </td>
                                        @if ($role == '1')
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-primary btn-action mr-1">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <button class="btn btn-danger btn-action" onclick="deleteConfirmation('{{  route('teachers.destroy', $teacher->id) }}')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <form id="form-delete" action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                        @else
                                        @endif
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No Data</td>
                                    </tr>
                                    @endforelse
                                </table>
                            </div>
                            <div class="float-right">
                                {{ $teachers->withQueryString()->links() }}
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