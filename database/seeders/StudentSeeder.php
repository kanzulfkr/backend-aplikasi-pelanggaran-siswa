<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 17,
                'nisn' => '11225533',
                'gender' => 'perempuan',
                'created_at' => now()
            ],
            [
                'user_id' => 18,
                'nisn' => '11225544',
                'gender' => 'laki',
                'created_at' => now()
            ],
            [
                'user_id' => 19,
                'nisn' => '11225555',
                'gender' => 'perempuan',
                'created_at' => now()
            ],
            [
                'user_id' => 20,
                'nisn' => '11225566',
                'gender' => 'laki',
                'created_at' => now()
            ],
            [
                'user_id' => 21,
                'nisn' => '112255677',
                'gender' => 'laki',
                'created_at' => now()
            ],
            [
                'user_id' => 22,
                'nisn' => '11225588',
                'gender' => 'perempuan',
                'created_at' => now()
            ],
            [
                'user_id' => 23,
                'nisn' => '11327823',
                'gender' => 'perempuan',
                'created_at' => now()
            ],
            [
                'user_id' => 24,
                'nisn' => '12345643',
                'gender' => 'laki',
                'created_at' => now()
            ],
            [
                'user_id' => 25,
                'nisn' => '12345564',
                'gender' => 'perempuan',
                'created_at' => now()
            ],
            [
                'user_id' => 26,
                'nisn' => '12984589',
                'gender' => 'perempuan',
                'created_at' => now()
            ],
        ];
        DB::table('students')->insert($data);
    }
}
