<?php

namespace Database\Seeders;

use App\Models\Venue;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Venue::create([
            'is_active' => true,
            'name' => 'Madison Square Gardens',
            'addr' => '4 Pennsylvania Plaza',
            'city' => 'New York',
            'state' => 'NY',
            'country' => 'USA',
            'zip' => '10001',
            'capacity' => '60,000',
            'type' => 'stadium',
            'url' => 'https://www.msg.com/madison-square-garden',
            'wiki' => 'https://en.wikipedia.org/wiki/Madison_Square_Garden',
            'dock_pin' => 'https://goo.gl/maps/rLoNuCGLX5EbzXCB6',
            'notes' => 'Madison Square Garden, colloquially known as The Garden or by its initials MSG, is a multi-purpose indoor arena in New York City. It is located in Midtown Manhattan between Seventh and Eighth avenues from 31st to 33rd Street, above Pennsylvania Station. It is the fourth venue to bear the name "Madison Square Garden"; the first two (1879 and 1890) were located on Madison Square, on East 26th Street and Madison Avenue, with the third Madison Square Garden (1925) farther uptown at Eighth Avenue and 50th Street.',
            // 'created_at' => Carbon::now(),
            // 'updated_at' => Carbon::now(),
        ]);
        Venue::create([
            'is_active' => true,
            'name' => 'Soldiers Field',
            'addr' => '1410 Special Olympics Dr',
            'city' => 'Chicago',
            'state' => 'IL',
            'country' => 'USA',
            'zip' => '60605',
            'capacity' => '60,000',
            'type' => 'stadium',
            'url' => 'https://www.soldierfield.com/',
            'wiki' => 'https://en.wikipedia.org/wiki/Soldier_Field',
            'dock_pin' => 'https://goo.gl/maps/5F93Ae4WM49Nqi6A9',
            'notes' => 'Soldier Field is a multi-purpose stadium on the Near South Side of Chicago, Illinois, United States. Opened in 1924 and reconstructed in 2003, the stadium has served as the home of the Chicago Bears of the National Football League (NFL) since 1971,[a] as well as Chicago Fire FC of Major League Soccer (MLS) from 1998 to 2005 and since 2020.[b] The stadium has a football capacity of 61,500, making it the smallest stadium in the NFL. Soldier Field is also the oldest stadium in both the NFL and MLS.',
            // 'created_at' => Carbon::now(),
            // 'updated_at' => Carbon::now(),
        ]);
        Venue::create([
            'is_active' => true,
            'name' => 'Arrowhead Stadium',
            'addr' => '1 Arrowhead Dr',
            'city' => 'Kansas City',
            'state' => 'MO',
            'country' => 'USA',
            'zip' => '64129',
            'capacity' => '76,416',
            'type' => 'stadium',
            'url' => 'https://www.chiefs.com/tickets/',
            'wiki' => 'https://en.wikipedia.org/wiki/Arrowhead_Stadium',
            'dock_pin' => 'https://goo.gl/maps/82rVVqKZGrxRoKdN7',
            'notes' => 'Arrowhead Stadium is an American football stadium in Kansas City, Missouri. It primarily serves as the home venue of the Kansas City Chiefs of the National Football League (NFL). The stadium has been officially named GEHA Field at Arrowhead Stadium (pronounced G.E.H.A.) since March 2021, following a naming rights deal between GEHA and the Chiefs. The agreement began at the start of the 2021 season and ends in January 2031 with the expiration of the leases for the Chiefs and Royals with the stadium\'s owner, the Jackson County Sports Complex Authority.',
        ]);
        Venue::create([
            'is_active' => true,
            'name' => 'AT&T Stadium',
            'addr' => '1 AT&T Way',
            'city' => 'Arlington',
            'state' => 'TX',
            'country' => 'USA',
            'zip' => '76011',
            'capacity' => '80,000',
            'type' => 'stadium',
            'url' => 'https://attstadium.com/',
            'wiki' => 'https://en.wikipedia.org/wiki/AT%26T_Stadium',
            'dock_pin' => 'https://goo.gl/maps/eZMLesRomMFT5Dwm9',
            'notes' => 'AT&T Stadium is a retractable-roof stadium in Arlington, Texas, United States. It serves as the home of the Dallas Cowboys of the National Football League (NFL), and was completed on May 27, 2009. It is also the home of the Cotton Bowl Classic and the Big 12 Championship Game. The stadium is one of eleven US venues set to host matches during the 2026 FIFA World Cup. The facility, owned by the city of Arlington, can also be used for a variety of other activities, such as concerts, basketball games, soccer, college and high-school football contests, rodeos, motocross, Spartan Races, and professional wrestling. It replaced the partially covered Texas Stadium, which served as the Cowboys\' home from 1971 through the 2008 season.',
        ]);
    }
}