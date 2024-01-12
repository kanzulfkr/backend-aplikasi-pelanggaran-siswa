@extends('layouts.app')

@section('title', 'New Khs')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>New Khs</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Khs</a></div>
                    <div class="breadcrumb-item">New Khs</div>
                </div>
            </div>

            <div class="section-body">


                <div class="card">
                    <form action="{{ route('khs.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>New Khs</h4>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="created_by" class="form-control" value="{{ auth()->user()->id }}">

                            <div class="form-group">
                                <label for="matakuliah">Matakuliah</label>
                                <select class="form-control select2" name="subject_id" style="width: 100%;" required>
                                    <option value=""></option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="mahasiswa">Mahasiswa</label>
                                <select class="form-control select2" name="student_id" style="width: 100%;">
                                    <option value=""></option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nilai</label>
                                <input type="number" class="form-control @error('nilai') is-invalid @enderror"
                                    id="nilai" step="0.01" min="0" max="100" oninput="hitungGrade()"
                                    name="nilai">
                                @error('nilai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Grade</label>
                                <input type="text" id="grade" name="grade"
                                    class="form-control @error('grade') is-invalid @enderror" readonly>
                                @error('grade')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <select name="keterangan" class="form-control">
                                    <option value="Lulus">Lulus</option>
                                    <option value="Tidak Lulus">Tidak Lulus</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tahun Akademik</label>
                                <select name="tahun_akademik" class="form-control">
                                    <option value="2023/2024">2023/2024</option>
                                    <option value="2022/2023">2022/2023</option>
                                    <option value="2021/2022">2021/2022</option>
                                    <option value="2020/2021">2020/2021</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Semester</label>
                                <select name="semester" class="form-control">
                                    <option value="Genap">Genap</option>
                                    <option value="Ganjil">Ganjil</option>
                                </select>
                            </div>

                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                    </form>


                </div>
            </div>
            <script>
                function hitungGrade() {
                    // Ambil nilai dari input nilai
                    var nilaiInput = parseFloat(document.getElementById("nilai").value);

                    // Tentukan grade berdasarkan kriteria
                    var grade;
                    if (nilaiInput >= 90) {
                        grade = 'A+';
                    } else if (nilaiInput >= 80) {
                        grade = 'A';
                    } else if (nilaiInput >= 70) {
                        grade = 'B';
                    } else if (nilaiInput >= 60) {
                        grade = 'C';
                    } else if (nilaiInput >= 50) {
                        grade = 'D';
                    } else {
                        grade = 'E';
                    }

                    // Isi input grade
                    document.getElementById("grade").value = grade;
                }
            </script>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
