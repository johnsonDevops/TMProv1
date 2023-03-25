<?php

namespace Database\Seeders;

use App\Models\APartyHotel;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AhotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        APartyHotel::create([
            'name' => 'A Party Hotel One (1)',
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
        APartyHotel::create([
            'name' => 'A Party Hotel Two (2)',
            'addr' => '67854 East Monroe St',
            'city' => 'New York',
            'state' => 'NY',
            'country' => 'USA',
            'zip' => '10001',
            'url' => 'https://www.msg.com/madison-square-garden',
            'poc_name' => 'Allison Smith',
            'poc_phone' => '0012037889876',
            'notes' => 'Free breakfast, Indoor swimming pool.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        APartyHotel::create([
            'name' => 'A Party Hotel Three (3)',
            'addr' => '555 N 100th St',
            'city' => 'New York',
            'state' => 'NY',
            'country' => 'USA',
            'zip' => '10001',
            'url' => 'https://www.msg.com/madison-square-garden',
            'poc_name' => 'Allison Smith',
            'poc_phone' => '0012037889876',
            'notes' => 'Free breakfast, Indoor swimming pool.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
