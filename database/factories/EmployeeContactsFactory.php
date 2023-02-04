<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeContacts>
 */
class EmployeeContactsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'contact' => fake()->phoneNumber(),
            'employee_id' => fake()->numberBetween(1, 10),
            'city' => fake()->city(),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}