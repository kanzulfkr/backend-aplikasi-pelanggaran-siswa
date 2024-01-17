<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UserSeeder::class,
            ViolationsTypeSeeder::class,
            StudentSeeder::class,
            TeacherSeeder::class,
            ViolationSeeder::class,
            ParentSeeder::class,
            ClassNameSeeder::class,
            StudentClassSeeder::class,
        ]);
    }
}
