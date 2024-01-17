@extends('layouts.app')

@section('title', 'Kelas')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kelas</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Kelas</a></div>
                <div class="breadcrumb-item">All Kelas</div>
            </div>
        </div>
        <div class="section-body">
            @include('layouts.alert')
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-left">
                                <div class="section-header-button">
                                    <a href="{{ route('student-classes.create') }}" class="btn btn-primary">Add New</a>
                                </div>
                            </div>
                            <div class="float-right">
                                <form method="GET" action="{{ route('student-classes.index') }}">
                                    <label for="searchInput" class="sr-only">Search</label>
                                    <div class="input-group">
                                        <input id="classIdInputs" type="hidden" name="class_id" value="">
                                        <input type="text" class="form-control" id="searchInput" placeholder="Search" name="name">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit" onclick="updateClassId('1')"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="clearfix mb-3"></div>
                            <form id="classForm" method="GET" action="{{ route('student-classes.index') }}">
                                <div class="badges">
                                    <ul class="nav nav-pills">
                                        @foreach ($className as $class)
                                        @php
                                        $activeClass = $student_classes->firstWhere('CId', $class->id) ? 'active' : '';
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
                                    document.getElementById('classIdInputs').value = classId;
                                    document.getElementById('classForm').submit();
                                }
                            </script>
                        </div>
                        <div class="card-body">
                            <div class="clearfix mb-3"></div>
                            <div class="table-responsive">
                                <table class="table-striped table">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Siswa</th>
                                        <th>NISN</th>
                                        <th>Jenis Kelamin</th>
                                        <th>
                                            <div class="d-flex justify-content-center">
                                                Action
                                            </div>
                                        </th>
                                    </tr>
                                    @foreach ($student_classes as $student_class)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $student_class->SName }}
                                        </td>
                                        <td>
                                            {{ $student_class->nisn }}
                                        </td>
                                        <td>
                                            {{ $student_class->gender == 'perempuan' ? 'Perempuan' : 'Laki-laki' }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('student-classes.edit', $student_class->id) }}" class="btn btn-primary btn-action mr-1">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <button class="btn btn-danger btn-action" onclick="deleteConfirmation('{{  route('student-classes.destroy', $student_class->id) }}')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <form id="form-delete" action="{{ route('student-classes.destroy', $student_class->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
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