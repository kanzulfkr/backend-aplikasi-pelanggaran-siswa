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
                            <form id="classForm" method="GET" action="{{ route('recapitulation') }}">
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
                            <script>
                                function updateClassId(classId) {
                                    document.getElementById('classIdInput').value = classId;
                                    document.getElementById('classForm').submit();
                                }
                            </script>
                            <div class="float-right">
                                <form method="GET" action="{{ route('recapitulation') }}">
                                    <label for="searchInput" class="sr-only">Search</label>
                                    <div class="input-group">
                                        <input type="hidden" name="class_id" value="{{ request('class_id') }}">
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
                                        <th>Nama Siswa</th>
                                        <th>NISN</th>
                                        <th>Total Pelanggaran</th>
                                        <th>Total Poin</th>
                                        <th>Status</th>
                                        <th>
                                            <div class="d-flex justify-content-center">
                                                Rincian </div>
                                        </th>
                                    </tr>
                                    @foreach ($usersData as $userData)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $userData['name'] }}</td>
                                        <td>{{ $userData['nisn'] }}</td>
                                        <td>{{ $userData['violations_total'] }}</td>
                                        <td>{{ $userData['point_total'] }}</td>
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
                                    @endforeach
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
<script>
    function submitForm(classId) {
        // Set the value of the hidden input to the clicked class id
        $('#classForm input[name="name"]').val(classId);

        // Submit the form
        $('#classForm').submit();
    }
</script>
<!-- JS Libraies -->
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/features-posts.js') }}"></script>
<script src="{{ asset('js/page/modules-sweetalert.js') }}"></script>
@endpush