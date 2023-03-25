<?php

namespace Database\Seeders;

use App\Models\BPartyHotel;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BhotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BPartyHotel::create([
            'name' => 'B Party Hotel One (1)',
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
        BPartyHotel::create([
            'name' => 'B Party Hotel Two (2)',
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
        BPartyHotel::create([
            'name' => 'B Party Hotel Three (3)',
            'addr' => '56787 North juno pl.',
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
