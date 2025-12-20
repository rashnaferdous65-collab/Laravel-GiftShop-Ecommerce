<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
   public function run(): void
{
    dd([
        'email' => 'test2@example.com'
    ]);

    User::create([
        'name' => 'Test User',
        'email' => 'test2@example.com',
        'phone' => '01712345678',
        'password' => Hash::make('password'),
    ]);
}

}




  