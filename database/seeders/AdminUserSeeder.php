<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'System',
                'last_name' => 'Admin',
                'username' => 'systemadmin',
                'email' => 'adminadmin@example.com',
                'password' => bcrypt('password'),
                'phone_number' => '+12398190255',
                'email_verified_at' => now(),
                'user_type' => 'admin',
                'status' => 'active',
        ]);
    }
}
