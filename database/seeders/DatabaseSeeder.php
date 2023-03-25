<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleAndPermissionSeeder::class,
            PartySeeder::class,
            DepartmentSeeder::class,
            AdminSeeder::class,
            VenueSeeder::class,
            AHotelSeeder::class,
            BHotelSeeder::class,
            CHotelSeeder::class,
            LocalContactsSeeder::class,
            EventSeeder::class,
            // DaysheetSeeder::class,
            // UserSeeder::class,
            
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
