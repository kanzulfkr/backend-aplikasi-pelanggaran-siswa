@extends('layouts.app')

@section('title', 'Edit Siswa')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Siswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Siswa</a></div>
                <div class="breadcrumb-item">Edit Siswa</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <form action="{{ route('students.update', $student) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Edit Siswa</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Your Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $student->user->name }}">
                            <div class="invalid-feedback">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $student->user->email }}" readonly>
                            <div class="invalid-feedback">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>NISN</label>
                            <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{ $student->nisn }}">
                            <div class="invalid-feedback">
                                @error('nisn')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $student->user->phone }}">
                            <div class="invalid-feedback">
                                @error('phone')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control select2 @error('gender') is-invalid @enderror" name="gender">
                                <option value="perempuan" @if ($student->gender == 'perempuan') selected @endif>Perempuan</option>
                                <option value="laki" @if ($student->gender == 'laki') selected @endif>Laki-laki</option>
                            </select>
                            <div class="invalid-feedback">
                                @error('gender')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <label>Address</label>
                            <textarea class="form-control  @error('address') is-invalid @enderror" data-height="150" name="address">{{ $student->user->address }}</textarea>
                            <div class="invalid-feedback">
                                @error('address')
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