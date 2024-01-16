<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 2,
                'nip' => '112233845',
                'gender' => 'perempuan',
                'created_at' => now()
            ],
            [
                'user_id' => 3,
                'nip' => '123213972',
                'gender' => 'laki',
                'created_at' => now()
            ],
            [
                'user_id' => 4,
                'nip' => '123878334',
                'gender' => 'perempuan',
                'created_at' => now()
            ],
            [
                'user_id' => 5,
                'nip' => '123878343',
                'gender' => 'laki',
                'created_at' => now()
            ],
            [
                'user_id' => 6,
                'nip' => '112378745',
                'gender' => 'laki',
                'created_at' => now()
            ],
            [
                'user_id' => 7,
                'nip' => '112233845',
                'gender' => 'perempuan',
                'created_at' => now()
            ],
            [
                'user_id' => 8,
                'nip' => '123213972',
                'gender' => 'laki',
                'created_at' => now()
            ],
            [
                'user_id' => 9,
                'nip' => '123878334',
                'gender' => 'perempuan',
                'created_at' => now()
            ],
            [
                'user_id' => 10,
                'nip' => '123878343',
                'gender' => 'laki',
                'created_at' => now()
            ],
            [
                'user_id' => 11,
                'nip' => '112233845',
                'gender' => 'perempuan',
                'created_at' => now()
            ],
            [
                'user_id' => 12,
                'nip' => '112233845',
                'gender' => 'perempuan',
                'created_at' => now()
            ],
            [
                'user_id' => 13,
                'nip' => '123213972',
                'gender' => 'laki',
                'created_at' => now()
            ],
            [
                'user_id' => 14,
                'nip' => '123878334',
                'gender' => 'perempuan',
                'created_at' => now()
            ],
            [
                'user_id' => 15,
                'nip' => '123878343',
                'gender' => 'laki',
                'created_at' => now()
            ],
            [
                'user_id' => 16,
                'nip' => '112378745',
                'gender' => 'laki',
                'created_at' => now()
            ],
        ];
        DB::table('teachers')->insert($data);
    }
}
