<?php

namespace Database\Seeders;

use App\Models\Party;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Party::create([
            'party_name' => 'A Party',
        ]);
        Party::create([
            'party_name' => 'B Party',
        ]);
        Party::create([
            'party_name' => 'C Party',
        ]);
        Party::create([
            'party_name' => 'Everyone',
        ]);
    }
}