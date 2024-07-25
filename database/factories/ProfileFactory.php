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
            'login' => $this->faker->unique()->userName(),
            'gender' => random_int(0, 1),
            'birthed_at' => fake()->dateTimeBetween('-50 years', '-18 years'),
            'avatar_path' => fake()->imageUrl,
            'first_name' => fake()->firstName,
            'second_name' => fake()->lastName,
            'third_name' => null
        ];
    }
}
