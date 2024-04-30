<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'full_name' => 'Jack Admin',
            'user_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('p@ssword10'),
            'status' => 'active',
        ]);

        $user = User::create([
            'full_name' => 'Jack User',
            'user_name' => 'Jack',
            'email' => 'jack@gmail.com',
            'password' => Hash::make('p@ssword10'),
            'status' => 'active',
        ]);


        // Assign roles
        $admin->assignRole('admin');
        $user->assignRole('user');

    }
}
