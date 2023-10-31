<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        $user = User::create([
            'first_name' => 'super',
            'last_name' => 'admin',
            'user_name' => 'super admin',
            'telegram_id' => '812239513',
            'role_id' => 1,
            'mobile_number' => '016123',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        $user->roles()->attach([1]);

        $user = User::create([
            'first_name' => 'customer',
            'last_name' => ' ',
            'user_name' => 'Customer One',
            'telegram_id' => '812239113',
            'role_id' => 2,
            'mobile_number' => '016132',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        $user->roles()->attach([2]);
    }
}
