<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(int $eventCount = 20, int $ticketCount = 5): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < $eventCount; $i++) {
            // Create event
            $event = Event::create([
                'name' => $faker->sentence,
                'slug' => $faker->unique()->slug(),
                'headline' => $faker->sentence,
                'description' => $faker->paragraph,
                'start_date' => $faker->dateTimeBetween('+1 month', '+6 months'),
                'location' => $faker->address,
                'duration' => $faker->numberBetween(1, 10),
            ]);

            // Create tickets
            for ($j = 0; $j < $ticketCount; $j++) {
                $event->tickets()->create([
                    'name' => $faker->sentence,
                    'price' => $faker->numberBetween(100, 1000),
                    'quantity' => $faker->numberBetween(10, 100),
                    'max_buy' => $faker->numberBetween(1, 10),
                ]);
            }
        }
    }
}
