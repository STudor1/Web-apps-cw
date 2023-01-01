<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            //This sets the pfp to a random user in our database (we only have 4 so far)
            //we'll have to check for max in future
            'user_id' => fake()->unique()->numberBetween(2, 4),
            'description' => fake()->text($maxNbChars = 400) ,
        ];
    }
}
