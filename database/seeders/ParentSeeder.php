<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 27,
                'student_id' => 1,
                'job_title' => 'Dokter Bedah',
                'gender' => 'perempuan',
                'created_at' => now()
            ],
            [
                'user_id' => 28,
                'student_id' => 2,
                'job_title' => 'Pegawai Bank Syariah Indonesia',
                'gender' => 'perempuan',
                'created_at' => now()
            ],
        ];
        DB::table('parents')->insert($data);
    }
}
