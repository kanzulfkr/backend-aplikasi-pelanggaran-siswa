@extends('layouts.app')

@section('title', 'New Data Pelanggaran')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>New Data Pelanggaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Data Pelanggaran</a></div>
                <div class="breadcrumb-item">New Data Pelanggaran</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <form action="{{ route('violations.store') }}" method="POST">
                    @csrf
                    <div class="card-header">
                        <h4>New Data Pelanggaran</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Siswa</label>
                            <select class="form-control select2 @error('student_id') is-invalid @enderror" name="student_id">
                                <option value="">Pilih Siswa</option>
                                @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->user->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                @error('student_id')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        @if (auth()->user()->roles == '1 ')
                        <div class="form-group">
                            <label>Petugas</label>
                            <select class="form-control select2 @error('officer_id') is-invalid @enderror" name="officer_id">
                                <option value="">Pilih Petugas</option>
                                @foreach ($officers as $officer)
                                <option value="{{ $officer->id }}">{{ $officer->user->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                @error('officer_id')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        @elseif (in_array(auth()->user()->roles, ['2', '3', '4','5']))
                        <div class="form-group">
                            <label>Petugas</label>
                            <input type="text" class="form-control @error('officer_id') is-invalid @enderror" name="officer_id" value="{{$loginUser->user->name}}" readonly>
                            <input type="hidden" name="officer_id" value="{{ $loginUser->id }}">
                            <div class="invalid-feedback">
                                @error('officer_id')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <label>Jenis Pelanggaran</label>
                            <select class="form-control select2 @error('violations_types_id') is-invalid @enderror" name="violations_types_id">
                                <option value="">Pilih Jenis Pelanggaran</option>
                                @foreach ($violations_types as $violations_type)
                                <option value="{{ $violations_type->id }}">{{ $violations_type->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                @error('violations_types_id')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Catatan</label>
                            <input type="text" class="form-control @error('catatan') is-invalid @enderror" name="catatan">
                            <div class="invalid-feedback">
                                @error('catatan')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="is_validate" value="0">
                        <input type="hidden" class="form-control" name="is_confirm" value="0">
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