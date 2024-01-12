@extends('layouts.app')

@section('title', 'Edit khs')
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
                <h1>Edit Khs</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Khs</a></div>
                    <div class="breadcrumb-item">Edit Khs</div>
                </div>
            </div>

            <div class="section-body">


                <div class="card">

                    <div class="card-header">
                        <h4>Edit Khs</h4>
                        <form action="{{ route('khs.update', $khs) }}" method="POST">
                            @csrf
                            @method('PATCH')

                    </div>
                    <div class="card-body">



                        <div class="form-group">
                            <label>Nama Mahasiswa</label>
                            <input type="text" class="form-control" value="{{ $khs->name }}" readonly>

                        </div>

                        <div class="form-group">
                            <label>Mata Kuliah</label>
                            <input type="text" class="form-control "value="{{ $khs->title }}" readonly>

                        </div>

                        <div class="form-group">
                            <label>Nilai</label>
                            <input type="number" class="form-control @error('nilai') is-invalid @enderror"
                                value="{{ $khs->nilai }}" id="nilai" step="0.01" min="0" max="100"
                                oninput="hitungGrade()" name="nilai">
                            @error('nilai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Grade</label>
                            <input type="text" id="grade" name="grade" value="{{ $khs->grade }}"
                                class="form-control @error('grade') is-invalid @enderror" readonly>
                            @error('grade')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label>Keterangan</label>
                            <select name="keterangan"
                                class="form-control select2 @error('keterangan') is-invalid @enderror">
                                <option value="Lulus" @if ($khs->keterangan == 'Lulus') selected @endif>Lulus</option>
                                <option value="Tidak Lulus" @if ($khs->keterangan == 'Tidak Lulus') selected @endif>Tidak Lulus
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tahun Akademik</label>
                            <select name="tahun_akademik"
                                class="form-control select2 @error('tahun-akademik') is-invalid @enderror">
                                <option value="2023/2024" @if ($khs->tahun_akademik == '2023/2024') selected @endif>2023/2024
                                </option>
                                <option value="2022/2023" @if ($khs->tahun_akademik == '2022/2023') selected @endif>2022/2023
                                </option>
                                <option value="2021/2022" @if ($khs->tahun_akademik == '2021/2022') selected @endif>2021/2022
                                </option>
                                <option value="2020/2021" @if ($khs->tahun_akademik == '2020/2021') selected @endif>2020/2021
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Semester</label>
                            <select name="semester" class="form-control select2 @error('semester') is-invalid @enderror">
                                <option value="Genap" @if ($khs->semester == 'Genap') selected @endif>Genap</option>
                                <option value="Ganjil" @if ($khs->semester == 'Ganjil') selected @endif>Ganjil</option>
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


                <script type="text/javascript">
                    $('.cari').select2({
                        placeholder: 'Cari...',
                        // Additional Select2 configuration options if needed
                    });
                </script>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
