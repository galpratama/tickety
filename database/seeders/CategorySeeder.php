<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryName = [
            'Music',
            'Workshop',
            'Business',
            'Food',
            'Startup',
            'Movies',
            'Game',
        ];

        foreach ($categoryName as $name) {
            Category::create([
                'name' => $name,
            ]);
        }
    }
}
