<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViolationsTypeSeeder extends Seeder
{

    public function run(): void
    {
        $data = [
            [
                'name' => 'Membawa/mengkonsumsi/mengedarkan miras dan obat-obatan terlarang/NAPSA di lingkungan atau di luar sekolah saat kegiatan sekolah dengan memakai seragam/atribut sekolah',
                'point' => 40,
                'type' => 'Berat',
            ],
            [
                'name' => 'Terlibat hubungan seks : Secara biologis (menikah maupun tidak menikah)',
                'point' => 40,
                'type' => 'Berat',
            ],
            [
                'name' => 'Terlibat hubungan seks : Hamil/Menghamili',
                'point' => 40,
                'type' => 'Berat',
            ],
            [
                'name' => 'Membuat video porno, gambar porno',
                'point' => 40,
                'type' => 'Berat',
            ],
            [
                'name' => 'Membuat/mengedarkan video porno, gambar porno baik milik sendiri maupun milik orang lain',
                'point' => 40,
                'type' => 'Berat',
            ],
            [
                'name' => 'Tersangkut perkara kriminal yang ditangani pihak kepolisian dan terbukti bersalah',
                'point' => 40,
                'type' => 'Berat',
            ],
            [
                'name' => 'Membawa senjata tajam atau sejenisnya tanpa sepengetahuan pihak sekolah dengan tujuan yang tidak baik (berbuat kriminal) dan dapat membahayakan dirinya sendiri dan orang lain',
                'point' => 40,
                'type' => 'Berat',
            ],
            [
                'name' => 'Menyerang guru, staf TU, dan karyawan sekolah baik secara fisik maupun non fisik, baik secara langsung maupun tidak langsung (medsos)',
                'point' => 40,
                'type' => 'Berat',
            ],
            [
                'name' => 'Merusak sarana dan prasarana sekolah secara sengaja dengan kategori berat sehingga menimbulkan kerugian besar',
                'point' => 40,
                'type' => 'Berat',
            ],
            [
                'name' => 'Mengambil milik orang lain/mencuri',
                'point' => 40,
                'type' => 'Berat',
            ],
            [
                'name' => 'Menjadi sumber utama penyebab terjadinya masalah serius dalam lingkungan sekolah atau kegiatan di luar sekolah dengan menggunakan seragam/atribut sekolah baik sebagai provokator maupun dalang/otak kerusuhan',
                'point' => 40,
                'type' => 'Berat',
            ],
            [
                'name' => 'Berkelahi di lingkungan sekolah dan atau di luar sekolah dengan menggunakan seragam/aktribut sekolah.',
                'point' => 30,
                'type' => 'Sedang',
            ],
            [
                'name' => 'Memalsukan tandatangan kepala sekolah/guru/wali kelas',
                'point' => 30,
                'type' => 'Sedang',
            ],
            [
                'name' => 'Memalsukan tandatangan Tanda tangan orang tua/wali murid',
                'point' => 20,
                'type' => 'Sedang',
            ],
            [
                'name' => 'Merubah/memalsukan nilai raport',
                'point' => 30,
                'type' => 'Sedang',
            ],
            [
                'name' => 'Berjudi di lingkungan sekolah',
                'point' => 20,
                'type' => 'Sedang',
            ],
            [
                'name' => 'Melakukan Bulliying, pelecehan, penghinaan kehormatan martabat kepala sekolah, guru/karyawan, maupun sesama peserta didik baik secara langsung maupun melalui medsos baik secara fisik maupun non fisik',
                'point' => 20,
                'type' => 'Sedang',
            ],
            [
                'name' => 'Melakukan pencemaran nama baik kepada kepala sekolah/guru/karyawan, maupun sesame peserta didik baik secara langsung maupun tidak langsung melalui medsos',
                'point' => 20,
                'type' => 'Sedang',
            ],
            [
                'name' => 'Melakukan pemerasan/pemalakan atau tindakan sejenis di lingkungan sekolah',
                'point' => 20,
                'type' => 'Sedang',
            ],
            [
                'name' => 'Merusak sarana dan prasarana sekolah secara sengaja sehingga menimbulkan kerugian sedang',
                'point' => 15,
                'type' => 'Sedang',
            ],
            [
                'name' => 'Merusak dengan sengaja barang milik orang lain dan terbukti bersalah',
                'point' => 15,
                'type' => 'Sedang',
            ],
            [
                'name' => 'Membawa buku porno/VCD porno/file atau perangkat elektronik yang bersifat pornografi di lingkungan sekolah',
                'point' => 15,
                'type' => 'Sedang',
            ],

            [
                'name' => 'Membawa rokok/merokok di lingkungan sekolah dan luar sekolah dengan memakai seragam/aktribut sekolah (baik rokok elektrik maupun non elektrik)',
                'point' => 10,
                'type' => 'Ringan',
            ],
            [
                'name' => 'Berpacaran di lingkungan sekolah baik pada saat jam-jam sekolah maupun di luar jam-jam sekolah',
                'point' => 10,
                'type' => 'Ringan',
            ],
            [
                'name' => 'Membawa/meledakkan petasan dilingkungan sekolah',
                'point' => 10,
                'type' => 'Ringan',
            ],
            [
                'name' => 'Melakukan pelecehan seksual dan perbuatan tidak senonoh',
                'point' => 10,
                'type' => 'Ringan',
            ],
            [
                'name' => 'Membuat surat palsu yang berkaitan dengan kegiatan sekolah baik di dalam maupun di luar sekolah',
                'point' => 10,
                'type' => 'Ringan',
            ],
            [
                'name' => 'Melindungi teman yang salah',
                'point' => 10,
                'type' => 'Ringan',
            ],
            [
                'name' => 'Melompat pagar/jendela sekolah',
                'point' => 10,
                'type' => 'Ringan',
            ],
            [
                'name' => 'Bertato pada anggota badan',
                'point' => 10,
                'type' => 'Ringan',
            ],
            [
                'name' => 'Membolos/keluar meninggalkan sekolah tanpa ijin',
                'point' => 6,
                'type' => 'Ringan',
            ],
            [
                'name' => 'Masuk sekolah tidak melalui pintu gerbang sekolah',
                'point' => 5,
                'type' => 'Ringan',
            ],
            [
                'name' => 'Memakai sepeda motor yang dimodifikasi tidak sesuai dengan aturan Kepolisian',
                'point' => 5,
                'type' => 'Ringan',
            ],
            [
                'name' => 'Merusak sarana dan prasarana sekolah secara sengaja sehingga menimbulkan kerugian ringan seperti mencorat coret dinding, meja, kursi, dll',
                'point' => 5,
                'type' => 'Ringan',
            ],
            [
                'name' => 'Menganggu/mengacau proses pembelajaran di kelas atau di lingkungan sekolah',
                'point' => 5,
                'type' => 'Ringan',
            ],
            [
                'name' => 'Tidak mengikuti upacara/kegiatan peringatan hari-hari besar baik di lingkungan sekolah maupun luar sekolah tanpa keterangan yang jelas',
                'point' => 5,
                'type' => 'Ringan',
            ],
            [
                'name' => 'Membolos/keluar meninggalkan kelas tanpa ijin',
                'point' => 3,
                'type' => 'Ringan',
            ],
            [
                'name' => 'Menggunakan HP tanda seijin guru pada saat jam pelajaran',
                'point' => 3,
                'type' => 'Ringan',
            ],
            [
                'name' => 'Membeli makanan pada saat pelajaran tanpa ijin dari pengajar',
                'point' => 3,
                'type' => 'Ringan',
            ],
            [
                'name' => 'Terlambat masuk sekolah di pagi hari',
                'point' => 3,
                'type' => 'Ringan',
            ],
            [
                'name' => 'Membuang sampah tidak pada tempatnya',
                'point' => 3,
                'type' => 'Ringan',
            ],
            [
                'name' => 'Tidak menggunakan aktribut sekolah sesuai aturan yang berlaku',
                'point' => 2,
                'type' => 'Ringan',
            ],
            [
                'name' => 'Tidak tertib/disiplin pada saat mengikuti kegiatan upacara bendera',
                'point' => 2,
                'type' => 'Ringan',
            ]
        ];
        DB::table('Violations_types')->insert($data);
    }
}
