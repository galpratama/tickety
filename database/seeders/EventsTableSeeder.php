<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(int $eventCount = 20, int $ticketCount = 5): void
    {
        // If categories is empty, run category seeder furst
        if (Category::count() === 0) {
            $this->call(CategorySeeder::class);
        }

        $faker = Factory::create();

        for ($i = 0; $i < $eventCount; $i++) {
            // Create event
            $event = Event::create([
                'name' => $faker->sentence(2),
                'slug' => $faker->unique()->slug(2),
                'headline' => $faker->sentence(13),
                'description' => $faker->paragraph,
                'start_time' => $faker->dateTimeBetween('+1 month', '+6 months'),
                'location' => $faker->address,
                'duration' => $faker->numberBetween(1, 10),
                'category_id' => $faker->numberBetween(1, 7),
                'type' => $faker->randomElement(['online', 'offline']),
                'is_popular' => $faker->boolean(20),
            ]);

            // Create tickets
            for ($j = 0; $j < $ticketCount; $j++) {
                $event->tickets()->create([
                    'name' => $faker->sentence(3),
                    'price' => $faker->numberBetween(100, 1000),
                    'quantity' => $faker->numberBetween(10, 100),
                    'max_buy' => $faker->numberBetween(1, 10),
                ]);
            }
        }
    }
}
