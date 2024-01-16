@extends('layouts.app')

@section('title', 'Edit Guru')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Guru</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Guru</a></div>
                <div class="breadcrumb-item">Edit Guru</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <form action="{{ route('teachers.update', $teacher) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Edit Guru</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Your Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $teacher->user->name }}">
                            <div class="invalid-feedback">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $teacher->user->email }}">
                            <div class="invalid-feedback">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control select2 @error('roles') is-invalid @enderror" name="roles">
                                <option value="2" @if ($teacher->user->roles == '2') selected @endif>Tata Tertib</option>
                                <option value="3" @if ($teacher->user->roles == '3') selected @endif>Wakasek Kesiswaan</option>
                                <option value="4" @if ($teacher->user->roles == '4') selected @endif>Wali Kelas</option>
                                <option value="5" @if ($teacher->user->roles == '5') selected @endif>Guru</option>
                            </select>
                            <div class="invalid-feedback">
                                @error('roles')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>NIP</label>
                            <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ $teacher->nip }}">
                            <div class="invalid-feedback">
                                @error('nip')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $teacher->user->phone }}">
                            <div class="invalid-feedback">
                                @error('phone')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control select2 @error('gender') is-invalid @enderror" name="gender">
                                <option value="perempuan" @if ($teacher->gender == 'perempuan') selected @endif>Perempuan</option>
                                <option value="laki" @if ($teacher->gender == 'laki') selected @endif>Laki-laki</option>
                            </select>
                            <div class="invalid-feedback">
                                @error('gender')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <label>Address</label>
                            <textarea class="form-control  @error('address') is-invalid @enderror" data-height="150" name="address">{{ $teacher->user->address }}</textarea>
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