<?php

namespace Database\Seeders;

use App\Models\LocalContact;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocalContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LocalContact::create([
            'name' => 'John Johnson',
            'email' => 'John@local.com',
            'phone' => '0013334445656',
            'notes' => 'Notes likley include areas they cover and other information important to you',
        ]);
        LocalContact::create([
            'name' => 'Texas Ranger',
            'email' => 'bigtexas@local.com',
            'phone' => '4327778889090',
            'notes' => 'Notes likley include areas they cover and other information important to you',
        ]);
    }
}
