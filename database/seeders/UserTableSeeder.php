<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'hotel_admin',
                'email' => 'hotel_admin@hoteltest.gr',
                'password' => Hash::make('1234')
            ],
            [
                'name' => 'hotel_poweruser',
                'email' => 'hotel_poweruser@hoteltest.gr',
                'password' => Hash::make('1234')
            ]
        ];

        foreach ($users as $key => $value) {
            \App\Models\User::factory()->create($value);
        }
    }
}
