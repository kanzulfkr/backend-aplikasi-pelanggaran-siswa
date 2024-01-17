@extends('layouts.app')

@section('title', 'New Kelas')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>New Kelas</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Kelass</a></div>
                <div class="breadcrumb-item">New Kelas</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <form action="{{ route('student-classes.store') }}" method="POST">
                    @csrf
                    <div class="card-header">
                        <h4>New Kelas</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Siswa</label>
                            <select class="form-control select2 @error('student_id') is-invalid @enderror" name="student_id">
                                <option value="">Pilih Siswa</option>
                                @foreach ($student as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                @error('student_id')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control select2 @error('class_name_id') is-invalid @enderror" name="class_name_id">
                                <option value="">Pilih Kelas</option>
                                @foreach ($className as $className)
                                <option value="{{ $className->id }}">{{ $className->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                @error('class_name_id')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->

<!-- Page Specific JS File -->
@endpush