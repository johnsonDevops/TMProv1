<?php

namespace Database\Seeders;

use App\Models\CPartyHotel;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CPartyHotel::create([
            'name' => 'C Party Hotel One (1)',
            'addr' => '218 W 35th St',
            'city' => 'New York',
            'state' => 'NY',
            'country' => 'USA',
            'zip' => '10001',
            'url' => 'https://www.msg.com/madison-square-garden',
            'poc_name' => 'John Jones',
            'poc_phone' => '0012037889876',
            'notes' => 'Free breakfast, Indoor swimming pool.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        CPartyHotel::create([
            'name' => 'C Party Hotel Two (2)',
            'addr' => '67854 East Monroe St',
            'city' => 'New York',
            'state' => 'NY',
            'country' => 'USA',
            'zip' => '10001',
            'url' => 'https://www.msg.com/madison-square-garden',
            'poc_name' => 'John Jones',
            'poc_phone' => '0012037889876',
            'notes' => 'Free breakfast, Indoor swimming pool.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        CPartyHotel::create([
            'name' => 'C Party Hotel Three (3)',
            'addr' => '555 N 100th St',
            'city' => 'New York',
            'state' => 'NY',
            'country' => 'USA',
            'zip' => '10001',
            'url' => 'https://www.msg.com/madison-square-garden',
            'poc_name' => 'John Jones',
            'poc_phone' => '0012037889876',
            'notes' => 'Free breakfast, Indoor swimming pool.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
