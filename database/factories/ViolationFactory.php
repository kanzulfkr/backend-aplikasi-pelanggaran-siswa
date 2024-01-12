<?php

namespace Database\Factories;

use App\Models\ViolationsType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ViolationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'violations_types_id' => ViolationsType::factory(),
            'student_id' => User::factory(),
            'officer_id' => User::factory(),
            'catatan' => $this->faker->paragraph(1),
            'is_validate' => 0,
        ];
    }
}
