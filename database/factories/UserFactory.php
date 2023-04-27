<?php

namespace Database\Factories;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
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
            'email' => fake()->email(),
            'type' => 'admin',
            'password' => Hash::make('1234'),
            'remember_token' => null,
        ];
    }
}
