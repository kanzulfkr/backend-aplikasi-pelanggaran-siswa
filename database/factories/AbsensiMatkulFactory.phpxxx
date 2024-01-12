<?php

namespace Database\Factories;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AbsensiMatkul>
 */
class AbsensiMatkulFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'schedule_id' => Schedule::factory(),
            'student_id' => User::factory(),
            'kode_absensi' => fake()->randomElement(['A1', 'A2', 'A3', 'A4', 'A5', 'A6']),
            'tahun_akademik' => fake()->randomElement(['2021/2022', '2022/2023', '2023/2024']),
            'semester' => fake()->randomElement(['Genap', 'Ganjil']),
            'pertemuan' => fake()->randomElement(['1', '2', '3', '4', '5', '6']),
            'status' => fake()->randomElement(['Hadir', 'Tidak Hadir']),
            'keterangan' => fake()->randomElement(['Sakit', 'Izin', 'Tanpa Keterangan']),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'nilai' => fake()->randomElement(['A', 'B', 'C', 'D', 'E']),
            'created_by' => fake()->randomElement(['1', '2', '3']),
            'updated_by' => fake()->randomElement(['1', '2', '3']),
        ];
    }
}
