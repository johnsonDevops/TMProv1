<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $superAdminRole = Role::create(['name' => 'super-admin']);
        $adminRole =    Role::create(['name' => 'admin']);
        $a_adminRole =  Role::create(['name' => 'a_admin']);
        $b_adminRole =  Role::create(['name' => 'b_admin']);
        $c_adminRole =  Role::create(['name' => 'c_admin']);
        $travelRole =   Role::create(['name' => 'travel']);
        $userRole =     Role::create(['name' => 'user']);


        // ADMINISTRATOR ============================================
        Permission::create(['name' => 'All Events']);
        Permission::create(['name' => 'View Events']);
        Permission::create(['name' => 'Create Events']);
        Permission::create(['name' => 'Edit Events']);
        Permission::create(['name' => 'Delete Events']);
        // 
        Permission::create(['name' => 'All ProductionAlerts']);
        Permission::create(['name' => 'View ProductionAlerts']);
        Permission::create(['name' => 'Create ProductionAlerts']);
        Permission::create(['name' => 'Edit ProductionAlerts']);
        Permission::create(['name' => 'Delete ProductionAlerts']);
        // 
        Permission::create(['name' => 'All LocalContacts']);
        Permission::create(['name' => 'View LocalContacts']);
        Permission::create(['name' => 'Create LocalContacts']);
        Permission::create(['name' => 'Edit LocalContacts']);
        Permission::create(['name' => 'Delete LocalContacts']);
        // 
        Permission::create(['name' => 'All Users']);
        Permission::create(['name' => 'View Users']);
        Permission::create(['name' => 'Create Users']);
        Permission::create(['name' => 'Edit Users']);
        Permission::create(['name' => 'Delete Users']);
        // 
        Permission::create(['name' => 'All Venues']);
        Permission::create(['name' => 'View Venues']);
        Permission::create(['name' => 'Create Venues']);
        Permission::create(['name' => 'Edit Venues']);
        Permission::create(['name' => 'Delete Venues']);
        // 
        // 
        // 
        // TRAVEL ============================================
        Permission::create(['name' => 'All Flights']);
        Permission::create(['name' => 'View Flights']);
        Permission::create(['name' => 'Create Flights']);
        Permission::create(['name' => 'Edit Flights']);
        Permission::create(['name' => 'Delete Flights']);
        // 
        // 
        // 
        // SYSTEM ============================================
        Permission::create(['name' => 'All Departments']);
        Permission::create(['name' => 'View Departments']);
        Permission::create(['name' => 'Create Departments']);
        Permission::create(['name' => 'Edit Departments']);
        Permission::create(['name' => 'Delete Departments']);
        // 
        Permission::create(['name' => 'All Parties']);
        Permission::create(['name' => 'View Parties']);
        Permission::create(['name' => 'Create Parties']);
        Permission::create(['name' => 'Edit Parties']);
        Permission::create(['name' => 'Delete Parties']);
        // 
        // 
        // 
        // A Party ============================================
        Permission::create(['name' => 'All APartyDaysheets']);
        Permission::create(['name' => 'View APartyDaysheets']);
        Permission::create(['name' => 'Create APartyDaysheets']);
        Permission::create(['name' => 'Edit APartyDaysheets']);
        Permission::create(['name' => 'Delete APartyDaysheets']);
        // 
        Permission::create(['name' => 'All APartyHotels']);
        Permission::create(['name' => 'View APartyHotels']);
        Permission::create(['name' => 'Create APartyHotels']);
        Permission::create(['name' => 'Edit APartyHotels']);
        Permission::create(['name' => 'Delete APartyHotels']);
        // 
        Permission::create(['name' => 'All APartyAlerts']);
        Permission::create(['name' => 'View APartyAlerts']);
        Permission::create(['name' => 'Create APartyAlerts']);
        Permission::create(['name' => 'Edit APartyAlerts']);
        Permission::create(['name' => 'Delete APartyAlerts']);
        // B Party ============================================
        Permission::create(['name' => 'All BPartyDaysheets']);
        Permission::create(['name' => 'View BPartyDaysheets']);
        Permission::create(['name' => 'Create BPartyDaysheets']);
        Permission::create(['name' => 'Edit BPartyDaysheets']);
        Permission::create(['name' => 'Delete BPartyDaysheets']);
        //    
        Permission::create(['name' => 'All BPartyHotels']);
        Permission::create(['name' => 'View BPartyHotels']);
        Permission::create(['name' => 'Create BPartyHotels']);
        Permission::create(['name' => 'Edit BPartyHotels']);
        Permission::create(['name' => 'Delete BPartyHotels']);
        //  
        Permission::create(['name' => 'All BPartyAlerts']);
        Permission::create(['name' => 'View BPartyAlerts']);
        Permission::create(['name' => 'Create BPartyAlerts']);
        Permission::create(['name' => 'Edit BPartyAlerts']);
        Permission::create(['name' => 'Delete BPartyAlerts']);
        // C Party ============================================
        Permission::create(['name' => 'All CPartyDaysheets']);
        Permission::create(['name' => 'View CPartyDaysheets']);
        Permission::create(['name' => 'Create CPartyDaysheets']);
        Permission::create(['name' => 'Edit CPartyDaysheets']);
        Permission::create(['name' => 'Delete CPartyDaysheets']);
        //  
        Permission::create(['name' => 'All CPartyHotels']);
        Permission::create(['name' => 'View CPartyHotels']);
        Permission::create(['name' => 'Create CPartyHotels']);
        Permission::create(['name' => 'Edit CPartyHotels']);
        Permission::create(['name' => 'Delete CPartyHotels']);
        // 
        Permission::create(['name' => 'All CPartyAlerts']);
        Permission::create(['name' => 'View CPartyAlerts']);
        Permission::create(['name' => 'Create CPartyAlerts']);
        Permission::create(['name' => 'Edit CPartyAlerts']);
        Permission::create(['name' => 'Delete CPartyAlerts']);

        // Information contributors
        $a_adminRole->givePermissionTo([
            'All APartyDaysheets',
            'All APartyHotels',
            'All APartyAlerts',
        ]);
        $b_adminRole->givePermissionTo([
            'All BPartyDaysheets',
            'All BPartyHotels',
            'All BPartyAlerts',
        ]);
        $c_adminRole->givePermissionTo([
            'All CPartyDaysheets',
            'All CPartyHotels',
            'All CPartyAlerts',
        ]);
        // Travel agent
        $travelRole->givePermissionTo([
            'All Flights',
        ]);
        // Travel agent
        $userRole->givePermissionTo([
            // 'All Flights',
        ]);
        // 
    }
}
