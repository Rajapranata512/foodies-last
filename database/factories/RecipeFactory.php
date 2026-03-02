<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Recipe>
 */
class RecipeFactory extends Factory
{
    protected $model = Recipe::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => fake()->words(2, true),
            'cuisine' => fake()->randomElement(Recipe::CUISINES),
            'description' => fake()->sentence(18),
            'meal_course' => fake()->randomElement(Recipe::COURSES),
            'time' => fake()->numberBetween(5, 180),
            'origin' => fake()->country(),
            'difficulty' => fake()->randomElement(Recipe::DIFFICULTIES),
            'image' => 'images/default.jpg',
        ];
    }
}
