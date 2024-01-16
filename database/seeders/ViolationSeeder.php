<?php

namespace Database\Seeders;

use App\Models\Violation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViolationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'violations_types_id' => 41,
                'student_id' => 17,
                'officer_id' => 10,
                'catatan' => '',
                'is_validate' => 0,
                'created_at' => now()
            ],
            [
                'violations_types_id' => 40,
                'student_id' => 24,
                'officer_id' => 14,
                'catatan' => '',
                'is_validate' => 1,
                'created_at' => now()
            ],
            [
                'violations_types_id' => 34,
                'student_id' => 22,
                'officer_id' => 8,
                'catatan' => '',
                'is_validate' => 0,
                'created_at' => now()
            ],
            [
                'violations_types_id' => 19,
                'student_id' => 19,
                'officer_id' => 3,
                'catatan' => '',
                'is_validate' => 0,
                'created_at' => now()
            ],
            [
                'violations_types_id' => 1,
                'student_id' => 25,
                'officer_id' => 16,
                'catatan' => '',
                'is_validate' => 0,
                'created_at' => now()
            ],
            [
                'violations_types_id' => 43,
                'student_id' => 20,
                'officer_id' => 9,
                'catatan' => '',
                'is_validate' => 1,
                'created_at' => now()
            ],
            [
                'violations_types_id' => 6,
                'student_id' => 17,
                'officer_id' => 12,
                'catatan' => '',
                'is_validate' => 1,
                'created_at' => now()
            ],
            [
                'violations_types_id' => 23,
                'student_id' => 23,
                'officer_id' => 7,
                'catatan' => '',
                'is_validate' => 0,
                'created_at' => now()
            ],
        ];
        DB::table('violations')->insert($data);
    }
}
