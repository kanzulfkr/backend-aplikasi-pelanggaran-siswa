@extends('layouts.app')

@section('title', 'New User')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>New User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Users</a></div>
                <div class="breadcrumb-item">New User</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="card-header">
                        <h4>New User</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                            <div class="invalid-feedback">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                            <div class="invalid-feedback">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                            <div class="invalid-feedback">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Roles</label>
                            <div class="selectgroup w-100 @error('roles') is-invalid @enderror">
                                <label class="selectgroup-item">
                                    <input type="radio" name="roles" value="1" class="selectgroup-input ">
                                    <span class="selectgroup-button">Admin</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="roles" value="5" class="selectgroup-input">
                                    <span class="selectgroup-button">Guru</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="roles" value="6" class="selectgroup-input">
                                    <span class="selectgroup-button">Siswa</span>
                                </label>
                            </div>
                            <div class="invalid-feedback">
                                @error('roles')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone">
                            <div class="invalid-feedback">
                                @error('phone')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <label>Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" data-height="150" name="address"></textarea>
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