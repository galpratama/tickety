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
        $categories = [
            [
                'name' => 'Music',
                'icon' => '/assets/svgs/ic-mic.svg',
            ],
            [
                'name' => 'Workshop',
                'icon' => null,
            ],
            [
                'name' => 'Business',
                'icon' => null,
            ],
            [
                'name' => 'Food',
                'icon' => null,
            ],
            [
                'name' => 'Startup',
                'icon' => '/assets/svgs/ic-chart-growth.svg',
            ],
            [
                'name' => 'Movies',
                'icon' => '/assets/svgs/ic-movie.svg',
            ],
            [
                'name' => 'Game',
                'icon' => '/assets/svgs/ic-console.svg',
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'icon' => $category['icon'],
            ]);
        }
    }
}
