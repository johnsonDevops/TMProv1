<?php

namespace Database\Seeders;

use App\Models\APartyHotel;
use App\Models\BPartyHotel;
use App\Models\CPartyHotel;
use App\Models\APartyDaysheet;
use App\Models\BPartyDaysheet;
use App\Models\CPartyDaysheet;
use Illuminate\Database\Seeder;

class DaysheetSeeder extends Seeder
{
    public function run()
    {
        $hotels = [
            ['name' => 'Hotel A'],
            ['name' => 'Hotel B'],
            ['name' => 'Hotel C'],
            ['name' => 'Hotel D'],
            ['name' => 'Hotel E'],
        ];

        $aDaysheets = [];
        $bDaysheets = [];
        $cDaysheets = [];

        for ($i = 1; $i <= 5; $i++) {
            $aDaysheets[] = [
                'hotel_id_1' => $i,
                'hotel_id_2' => $i + 1,
                'is_active' => true,
                'day_type' => 'A',
                'notes' => 'Some notes for A Party Daysheet ' . $i,
                'schedule' => ['item 1', 'item 2', 'item 3'],
            ];

            $bDaysheets[] = [
                'hotel_id_1' => $i,
                'hotel_id_2' => $i + 1,
                'is_active' => true,
                'day_type' => 'B',
                'notes' => 'Some notes for B Party Daysheet ' . $i,
                'schedule' => ['item 1', 'item 2', 'item 3'],
            ];

            $cDaysheets[] = [
                'hotel_id_1' => $i,
                'hotel_id_2' => $i + 1,
                'is_active' => true,
                'notes' => 'Some notes for C Party Daysheet ' . $i,
                'schedule' => ['item 1', 'item 2', 'item 3'],
            ];
        }

        foreach ($hotels as $hotel) {
            APartyHotel::create($hotel);
            BPartyHotel::create($hotel);
            CPartyHotel::create($hotel);
        }

        foreach ($aDaysheets as $daysheet) {
            APartyDaysheet::create($daysheet);
        }

        foreach ($bDaysheets as $daysheet) {
            BPartyDaysheet::create($daysheet);
        }

        foreach ($cDaysheets as $daysheet) {
            CPartyDaysheet::create($daysheet);
        }
    }
}
