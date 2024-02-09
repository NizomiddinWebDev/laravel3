<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tg_id' => fake()->name(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'father_name' => fake()->lastName(),
            'region' =>fake()->streetName(),
            'district' =>fake()->streetName(),
            'school' =>fake()->name(),
            'phone' =>fake()->phoneNumber(),
            'subject' =>fake()->name(),

        ];
    }
}
