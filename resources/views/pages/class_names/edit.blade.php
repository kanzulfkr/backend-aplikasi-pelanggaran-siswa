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
                <form action="{{ route('class-names.update', $class_name) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Edit Guru</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $class_name->name }}">
                            <div class="invalid-feedback">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Wali Kelas</label>
                            <select class="form-control select2 @error('wali_kelas_id') is-invalid @enderror" name="wali_kelas_id">
                                <option value="">Pilih Siswa</option>
                                @foreach ($user as $user)
                                <option value="{{$user->id}}" @if ($user->user_id == $walikelas->user_id) selected @endif>{{ $user->name }}</option>

                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                @error('wali_kelas_id')
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