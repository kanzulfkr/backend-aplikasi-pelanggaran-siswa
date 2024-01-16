@extends('layouts.app')

@section('title', 'New Jenis Pelanggaran')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>New Jenis Pelanggaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Jenis Pelanggaran</a></div>
                <div class="breadcrumb-item">New Jenis Pelanggaran</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <form action="{{ route('violations-types.store') }}" method="POST">
                    @csrf
                    <div class="card-header">
                        <h4>New Jenis Pelanggaran</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Jenis Pelanggaran</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                            <div class="invalid-feedback">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Poin</label>
                            <input type="number" class="form-control @error('point') is-invalid @enderror" name="point">
                            <div class="invalid-feedback">
                                @error('point')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tipe</label>
                            <select name="type" class="form-control select2 @error('type') is-invalid @enderror">
                                <option value="Ringan">Ringan</option>
                                <option value="Sedang">Sedang</option>
                                <option value="Berat">Berat</option>
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