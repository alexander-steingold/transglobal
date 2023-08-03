<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'city' => fake()->city,
            'address' => fake()->address,
            'zip' => fake()->postcode,
            'email' => fake()->email,
            'phone' => fake()->phoneNumber,
            'mobile' => fake()->phoneNumber,
            'pid' => fake()->numberBetween(300000000, 310000000)
        ];
    }
}
