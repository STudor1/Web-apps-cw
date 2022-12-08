<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProfilePicture>
 */
class ProfilePictureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //This sets the pfp to a random user in our database (we only have 4 so far)
            //we'll have to check for max in future
            'user_id' => fake()->unique()->numberBetween(2, 4),
            'picture' => "hey",
            #'picture' => fake()->image($dir = './storage/images', $width = 50, $height = 50, null, false),

            //I will need to use faker to get pictures then to seed some random profiles
        ];
    }
}
