<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Khs>
 */
class KhsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subject_id' => Subject::factory(),
            'student_id' => User::factory(),
            'nilai' => fake()->randomElement(['4', '3', '2', '1', '0']),
            'grade' => fake()->randomElement(['A', 'B', 'C', 'D', 'E']),
            'keterangan' => fake()->randomElement(['Lulus', 'Tidak Lulus']),
            'tahun_akademik' => fake()->randomElement(['2021/2022', '2022/2023', '2024/2025']),
            'semester' => fake()->randomElement(['Ganjil', 'Genap']),
            'created_by' => fake()->randomElement(['1', '2', '3']),
            'updated_by' => fake()->randomElement(['1', '2', '3']),
        ];
    }
}
