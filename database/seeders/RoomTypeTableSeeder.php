<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomTypes = [
            [
                'id' => 1,
                'title' => 'Single Room'
            ],
            [
                'id' => 2,
                'title' => 'Double Room'
            ],
            [
                'id' => 3,
                'title' => 'Triple Room'
            ],
            [
                'id' => 4,
                'title' => 'Fourfold Room'
            ],
           
        ];

        foreach ($roomTypes as $key => $value) {
            \App\Models\RoomType::create($value);
        }
    }
}
