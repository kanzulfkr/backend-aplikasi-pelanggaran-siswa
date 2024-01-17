<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak PDF Rekapitulasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <!-- <style>
        @media print {
            button {
                display: none !important;
            }
        }
    </style> -->
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-2">DAFTAR JUMLAH POIN PELANGGARAN SISWA</h2>
        <h2 class="text-center mb-2">SMA NEGERI 1 MADIUN</h2>
        <h2 class="text-center mb-2">TAHUN PELAJARAN 2022/2023</h2>
        <div class="clearfix mb-5"></div>
        <h5 class="text-end mb-2">Wali Kelas : {{$toArray['Uname']}}</h5>
        <h5 class="text-end mb-2">Kelas : {{$toArray['name']}}</h5>
        <div class="d-flex justify-content-end mb-4">
            <button id="cetakButton" onclick="cetakHalaman()">Cetak Halaman</button>
        </div>
        <table class="table table-bordered mb-5 mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th style="width: 20%;">Nama Siswa</th>
                    <th>NISN</th>
                    <th>Jumlah</th>
                    <th>Poin</th>
                    <th style="width: 20%;">Status</th>
                    <th>
                        <div class="d-flex justify-content-center">
                            Rincian </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($usersData as $userData)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $userData['name'] }}</td>
                    <td>{{ $userData['nisn'] }}</td>
                    <td>{{ $userData['violations_total'] }}</td>
                    <td>{{ $userData['point_total'] }}</td>
                    <td>{{ $userData['status'] }}</td>
                    <td>
                        <ul>
                            @foreach ($userData['violations'] as $violation)
                            <li>
                                ({{ $violation->created_at }})
                                {{ $violation->VTName  }}
                            </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function cetakHalaman() {
            document.getElementById('cetakButton').style.display = 'none';
            window.print();
            setTimeout(function() {
                document.getElementById('cetakButton').style.display = 'block';
            }, 1000);
        }
    </script>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>

</html>