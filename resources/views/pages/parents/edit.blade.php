@extends('layouts.app')

@section('title', 'Edit Wali Murid')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Wali Murid</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Wali Murid</a></div>
                <div class="breadcrumb-item">Edit Wali Murid</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <form action="{{ route('parents.update', $parent) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Edit Wali Murid</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $parent->user->name }}">
                            <div class="invalid-feedback">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $parent->user->email }}" readonly>
                            <div class="invalid-feedback">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Siswa</label>
                            <select class="form-control select2 @error('student_id') is-invalid @enderror" name="student_id">
                                <option value="">Pilih Siswa</option>
                                @foreach ($user as $user)
                                <option value="{{$user->id}}" @if ($user->student_id == $student->user_id) selected @endif>{{ $user->name }}</option>
                                <!-- <option value="{{ $user->student_id }}" @if ($user->student_id == $student->user_id) selected @endif>{{ $user->name }}</option> -->
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                @error('student_id')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <input type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ $parent->job_title}}">
                            <div class="invalid-feedback">
                                @error('job_title')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $parent->user->phone }}">
                            <div class="invalid-feedback">
                                @error('phone')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control select2 @error('gender') is-invalid @enderror" name="gender">
                                <option value="perempuan" @if ($parent->user->gender == 'perempuan') selected @endif>Perempuan</option>
                                <option value="laki" @if ($parent->user->gender == 'laki') selected @endif>Laki-laki</option>
                            </select>
                            <div class="invalid-feedback">
                                @error('gender')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <label>Address</label>
                            <textarea class="form-control  @error('address') is-invalid @enderror" data-height="150" name="address">{{ $parent->user->address }}</textarea>
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