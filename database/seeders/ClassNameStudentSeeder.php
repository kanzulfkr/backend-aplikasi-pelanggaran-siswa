<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassNameStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'class_name_id' => 1,
                'student_id' => 1,
                'created_at' => now()
            ],
            [
                'class_name_id' => 1,
                'student_id' => 2,
                'created_at' => now()
            ],
            [
                'class_name_id' => 1,
                'student_id' => 3,
                'created_at' => now()
            ],
            [
                'class_name_id' => 2,
                'student_id' => 4,
                'created_at' => now()
            ],
            [
                'class_name_id' => 2,
                'student_id' => 5,
                'created_at' => now()
            ],
            [
                'class_name_id' => 2,
                'student_id' => 6,
                'created_at' => now()
            ],

        ];
        DB::table('class_name_students')->insert($data);
    }
}
