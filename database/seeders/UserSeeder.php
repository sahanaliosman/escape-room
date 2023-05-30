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
    public function run()
    {
        $users = [
            [
                'name' => 'Ali Osman ŞAHAN',
                'email' => 'sahanaliosman@gmail.com',
                'password' => Hash::make('123456'),
                'birthdate' => "1990-07-13"
            ],
            [
                'name' => 'Sanctum User 1',
                'email' => 'sanctum@laravel.com',
                'password' => Hash::make('123456'),
                'birthdate' => "1994-05-29"
            ],
            [
                'name' => 'Sanctum User 2',
                'email' => 'sanctum2@laravel.com',
                'password' => Hash::make('123456'),
                'birthdate' => "1998-04-01"
            ],
        ];

        foreach ($users as $user) {
            User::insert($user);
        }
    }
}
