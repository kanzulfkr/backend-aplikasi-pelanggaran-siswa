@extends('layouts.app')

@section('title', 'Edit Jenis Pelanggaran')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Jenis Pelanggaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Jenis Pelanggaran</a></div>
                <div class="breadcrumb-item">Edit Jenis Pelanggaran</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <form action="{{ route('violations-types.update', $violations_type) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Edit Jenis Pelanggaran</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Jenis Pelanggaran</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $violations_type->name }}">
                            <div class="invalid-feedback">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Poin</label>
                            <input type="number" class="form-control @error('point') is-invalid @enderror" name="point" value="{{ $violations_type->point }}">
                            <div class="invalid-feedback">
                                @error('point')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tipe</label>
                            <select name="type" class="form-control select2 @error('type') is-invalid @enderror">
                                <option value="Ringan" @if ($violations_type->type == 'Ringan') selected @endif>Ringan
                                </option>
                                <option value="Sedang" @if ($violations_type->type == 'Sedang') selected @endif>Sedang
                                </option>
                                <option value="Berat" @if ($violations_type->type == 'Berat') selected @endif>Berat
                                </option>
                            </select>
                            <div class="invalid-feedback">
                                @error('type')
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