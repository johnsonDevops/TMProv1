<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([

            'dept_name' => 'production',
        ]);
        Department::create([

            'dept_name' => 'misc',
        ]);
        Department::create([

            'dept_name' => 'dressing_room',
        ]);
        Department::create([
            
            'dept_name' => 'power',
        ]);
        Department::create([
            
            'dept_name' => 'backline',
        ]);
        Department::create([
            
            'dept_name' => 'audio',
        ]);
        Department::create([
            
            'dept_name' => 'wardrobe',
        ]);
        Department::create([
            
            'dept_name' => 'security',
        ]);
        Department::create([
            
            'dept_name' => 'rigging',
        ]);
        Department::create([
            
            'dept_name' => 'carps_props',
        ]);
        Department::create([
            
            'dept_name' => 'lighting',
        ]);
        Department::create([
            
            'dept_name' => 'video',
        ]);
        Department::create([
            
            'dept_name' => 'automation',
        ]);
        Department::create([
            
            'dept_name' => 'sfx',
        ]);
        Department::create([
            
            'dept_name' => 'barrier',
        ]);
        Department::create([
            
            'dept_name' => 'catering',
        ]);
        Department::create([
            
            'dept_name' => 'merch',
        ]);
        Department::create([
            
            'dept_name' => 'live_nation_touring',
        ]);
        Department::create([
            
            'dept_name' => 'management',
        ]);
        Department::create([
            
            'dept_name' => 'creative',
        ]);
        Department::create([
            
            'dept_name' => 'vendors',
        ]);

    }
}

