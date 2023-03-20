<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::truncate(); // Delete all records from the roles table
        
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'investor']);
        Role::create(['name' => 'user']);
    }
}
