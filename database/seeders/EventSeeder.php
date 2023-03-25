<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Event;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $current_date = Carbon::now();
        $start_date = $current_date->copy()->subDays(7);
        $end_date = $current_date->copy()->addMonths(2);

        $locations = [
            ['city' => 'New York', 'country' => 'USA'],
            ['city' => 'Los Angeles', 'country' => 'USA'],
            ['city' => 'Chicago', 'country' => 'USA'],
            ['city' => 'Houston', 'country' => 'USA'],
            ['city' => 'Phoenix', 'country' => 'USA'],
            ['city' => 'Toronto', 'country' => 'Canada'],
            ['city' => 'Vancouver', 'country' => 'Canada'],
            ['city' => 'Montreal', 'country' => 'Canada'],
            ['city' => 'Mexico City', 'country' => 'Mexico'],
            ['city' => 'Guadalajara', 'country' => 'Mexico'],
            ['city' => 'Paris', 'country' => 'France'],
            ['city' => 'Marseille', 'country' => 'France'],
            ['city' => 'Berlin', 'country' => 'Germany'],
            ['city' => 'Munich', 'country' => 'Germany'],
            ['city' => 'Madrid', 'country' => 'Spain'],
            ['city' => 'Barcelona', 'country' => 'Spain'],
            ['city' => 'Rome', 'country' => 'Italy'],
            ['city' => 'Milan', 'country' => 'Italy'],
            ['city' => 'Tokyo', 'country' => 'Japan'],
            ['city' => 'Osaka', 'country' => 'Japan'],
        ];

        for ($date = $start_date; $date->lte($end_date); $date->addDay()) {
            $location = $faker->randomElement($locations);
            Event::create([
                'name' => 'Placeholder',
                'date' => $date->toDateString(),
                'city' => $location['city'],
                'country' => $location['country'],
                'day_type' => $faker->randomElement(['off', 'load_in', 'travel', 'show']),
                'is_active' => true,
            ]);
        }
    }



















    
    // public function run()
    // {
    //     $faker = Faker::create();

    //     $start_date = Carbon::create(2023, 2, 25, 0, 0, 0, 'America/New_York');
    //     $end_date = Carbon::create(2023, 9, 30, 0, 0, 0, 'America/New_York');

    //     $cities = ['New York', 'Los Angeles', 'Chicago', 'Houston', 'Phoenix', 'Philadelphia', 'San Antonio', 'San Diego', 'Dallas', 'San Jose', 'Austin', 'Jacksonville', 'Fort Worth', 'Columbus', 'San Francisco', 'Charlotte', 'Indianapolis', 'Seattle', 'Denver', 'Washington'];
    //     $countries = ['USA', 'Canada', 'Mexico', 'UK', 'Ireland', 'France', 'Germany', 'Spain', 'Italy', 'Japan', 'South Korea', 'Australia', 'New Zealand', 'China', 'Brazil', 'Argentina', 'Chile', 'Peru', 'Colombia', 'South Africa'];

    //     for ($date = $start_date; $date->lte($end_date); $date->addDay()) {
    //         Event::create([
    //             'name' => 'Not Updated',
    //             'date' => $date->toDateString(),
    //             'city' => $faker->randomElement($cities),
    //             'country' => $faker->randomElement($countries),
    //             'day_type' => $faker->randomElement(['off', 'load_in', 'travel', 'show']),
    //             'is_active' => true,
    //         ]);
    //     }
    // }
}

