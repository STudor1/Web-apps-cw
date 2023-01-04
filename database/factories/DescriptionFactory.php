<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Description>
 */
class DescriptionFactory extends Factory
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
            //This sets the description to a random user in our database
            'user_id' => fake()->unique()->numberBetween(2, User::count()),
            'description' => fake()->text($maxNbChars = 400) ,
        ];
    }
}
