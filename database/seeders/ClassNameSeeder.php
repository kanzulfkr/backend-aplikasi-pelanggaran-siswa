<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'X MIPA 1',
                'wali_kelas_id' => 4,
                'created_at' => now()
            ],
            [
                'name' => 'X MIPA 2',
                'wali_kelas_id' => 5,
                'created_at' => now()
            ],
        ];
        DB::table('class_names')->insert($data);
    }
}
