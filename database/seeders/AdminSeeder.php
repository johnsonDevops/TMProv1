<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Main Admin
        $admin = User::create([
            'name'              => 'Admin User',
            'email'             => 'admin@admin.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('admin123'),
            'remember_token'    => Str::random(10),
            'is_active'         => 1,
            'title'             => 'Application Admin',
            'phone'             => '12037887492',
            'dept'              => '3',
            'f_name'            => 'Admin',
            'l_name'            => 'User',
        ])->assignRole('admin', 'user');
        // 
        // A Party Admin
        $a_admin = User::create([
            'name'              => 'A Party Admin',
            'email'             => 'aparty@admin.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('admin123'),
            'remember_token'    => Str::random(10),
            'is_active'         => 1,
            'title'             => 'A Party Admin',
            'phone'             => '1234567890',
            'dept'              => '3',
            'f_name'            => 'A Party',
            'l_name'            => 'Admin',

        ])->assignRole('a_admin', 'user');
        // 
        // B Party Admin
        $b_admin = User::create([
            'name'              => 'B Party Admin',
            'email'             => 'bparty@admin.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('admin123'),
            'remember_token'    => Str::random(10),
            'is_active'         => 1,
            'title'             => 'B Party Admin',
            'phone'             => '1234567890',
            'dept'              => '3',
            'f_name'            => 'B Party',
            'l_name'            => 'Admin',

        ])->assignRole('b_admin', 'user');
        // 
        // 
        // C Party Admin
        $c_admin = User::create([
            'name'              => 'C Party Admin',
            'email'             => 'cparty@admin.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('admin123'),
            'remember_token'    => Str::random(10),
            'is_active'         => 1,
            'title'             => 'B Party Admin',
            'phone'             => '1234567890',
            'dept'              => '3',
            'f_name'            => 'B Party',
            'l_name'            => 'Admin',

        ])->assignRole('c_admin', 'user');
        // 
        // Travel Agent
        $travel = User::create([
            'name'              => 'Travel Agent',
            'email'             => 'travel@agent.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'remember_token'    => Str::random(10),
            'is_active'         => 1,
            'title'             => 'Travel Agent',
            'phone'             => '1234567890',
            'f_name'            => 'Travel',
            'l_name'            => 'Agent',
        ])->assignRole('travel', 'user');
        // 
        // Basic User
        $user = User::create([
            'name'              => 'Basic User',
            'email'             => 'basic@user.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'remember_token'    => Str::random(10),
            'is_active'         => 1,
            'title'             => 'User',
            'phone'             => '1234567890',
            'dept'              => '3',
            'f_name'            => 'Basic',
            'l_name'            => 'User',
        ])->assignRole('user');
    }
}
