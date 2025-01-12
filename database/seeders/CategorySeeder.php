<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Food', 'slug' => 'food'],
            ['name' => 'Services', 'slug' => 'services'],
            ['name' => 'Merchandise', 'slug' => 'merchandise'],
            // Add more categories as needed
        ];

        foreach ($categories as $category) {
            // Avoid duplicate entries
            Category::updateOrCreate(
                ['name' => $category['name']], // Match on the name field
                ['slug' => $category['slug']] // Update or set the slug
            );
        }
    }
}
