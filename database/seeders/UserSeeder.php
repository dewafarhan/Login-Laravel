<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'SuperAdmin', 
            'email' => 'superadmin@gmail.com',
            'role' => 'Superadmin',
            'status' => 'Active',
            'password' => 'superadmin'
        ]);

        User::create([
            'name' => 'Administrator',
            'email' => 'administrator@gmail.com',
            'role' => 'Administrator',
            'status' => 'Active',
            'password' => 'administrator'
        ]);

        User::create([
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'role' => 'Staff',
            'status' => 'Active',
            'password' => 'staff'
        ]);
    }
}
