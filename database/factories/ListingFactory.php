<?php

namespace Database\Factories;

use App\Models\Listing;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListingFactory extends Factory
{
    protected $model = Listing::class;

    // database/factories/ListingFactory.php
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'availability' => $this->faker->boolean,
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'photos' => [$this->faker->imageUrl()], // Add placeholder photo URLs
        ];
    }
}
