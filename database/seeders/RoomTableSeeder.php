<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Hilton Hotel',
                'type_id' => 1,
                'city' => 'Athens',
                'area'=> 'Zwgrafou',
                'photo_url' => 'room-1.jpg',
                'count_of_guests' => 1,
                'price' => 350,
                'address' => 'Vasilis Sofeias 38',
                'location_lat' => 37.9767030,
                'location_long' => 23.7504170,
                'description_short' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.' ,
                'description_long' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt quos ipsam distinctio repudiandae nobis? Rerum corporis consequuntur sapiente sed? Labore minus eaque consequuntur inventore vel mollitia placeat officia facere dolores, doloremque dolor cupiditate ipsum modi soluta itaque veritatis voluptatem necessitatibus tempore eligendi maxime tempora facilis! Porro accusantium reiciendis dolore id?',
                'parking' => 1,
                'wifi' => 1,
                'pet_friendly' => 0
            ],
            [
                'name' => 'Megali Vretania Hotel',
                'type_id' => 2,
                'city' => 'Athens',
                'area'=> 'Syntagma',
                'photo_url' => 'room-2.jpg',
                'count_of_guests' => 2,
                'price' => 500,
                'address' => 'Vasilis Olgas, 115',
                'location_lat' => 37.9765250,
                'location_long' => 23.7353970,
                'description_short' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.' ,
                'description_long' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt quos ipsam distinctio repudiandae nobis? Rerum corporis consequuntur sapiente sed? Labore minus eaque consequuntur inventore vel mollitia placeat officia facere dolores, doloremque dolor cupiditate ipsum modi soluta itaque veritatis voluptatem necessitatibus tempore eligendi maxime tempora facilis! Porro accusantium reiciendis dolore id?',
                'parking' => 1,
                'wifi' => 1,
                'pet_friendly' => 0
            ],
            [
                'name' => 'Apollo Hotel',
                'type_id' => 3,
                'city' => 'Athens',
                'area'=> 'Kentro',
                'photo_url' => 'room-3.jpg',
                'count_of_guests' => 3,
                'price' => 420,
                'address' => 'Achilleos 10',
                'location_lat' => 37.9853780,
                'location_long' => 23.7199320,
                'description_short' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.' ,
                'description_long' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt quos ipsam distinctio repudiandae nobis? Rerum corporis consequuntur sapiente sed? Labore minus eaque consequuntur inventore vel mollitia placeat officia facere dolores, doloremque dolor cupiditate ipsum modi soluta itaque veritatis voluptatem necessitatibus tempore eligendi maxime tempora facilis! Porro accusantium reiciendis dolore id?',
                'parking' => 1,
                'wifi' => 1,
                'pet_friendly' => 1
            ],
            [
                'name' => 'Oscar Hotel',
                'type_id' => 2,
                'city' => 'Athens',
                'area'=> 'Kentro',
                'photo_url' => 'room-4.jpg',
                'count_of_guests' => 2,
                'price' => 250,
                'address' => 'Filadelfias 25',
                'location_lat' => 37.9973410,
                'location_long' => 23.7219820,
                'description_short' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.' ,
                'description_long' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt quos ipsam distinctio repudiandae nobis? Rerum corporis consequuntur sapiente sed? Labore minus eaque consequuntur inventore vel mollitia placeat officia facere dolores, doloremque dolor cupiditate ipsum modi soluta itaque veritatis voluptatem necessitatibus tempore eligendi maxime tempora facilis! Porro accusantium reiciendis dolore id?',
                'parking' => 0,
                'wifi' => 1,
                'pet_friendly' => 0
            ],
            [
                'name' => 'Anatolia Hotel',
                'type_id' => 2,
                'city' => 'Thessaloniki',
                'area'=> 'Kentro',
                'photo_url' => 'room-5.jpg',
                'count_of_guests' => 2,
                'price' => 400,
                'address' => 'Lagkada 13',
                'location_lat' => 40.6477560,
                'location_long' => 22.9342730,
                'description_short' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.' ,
                'description_long' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt quos ipsam distinctio repudiandae nobis? Rerum corporis consequuntur sapiente sed? Labore minus eaque consequuntur inventore vel mollitia placeat officia facere dolores, doloremque dolor cupiditate ipsum modi soluta itaque veritatis voluptatem necessitatibus tempore eligendi maxime tempora facilis! Porro accusantium reiciendis dolore id?',
                'parking' => 1,
                'wifi' => 1,
                'pet_friendly' => 1
            ],
            [
                'name' => 'Nea Metropolis Hotel',
                'type_id' => 3,
                'city' => 'Thessaloniki',
                'area'=> 'Kentro',
                'photo_url' => 'room-6.jpg',
                'count_of_guests' => 3,
                'price' => 320,
                'address' => 'Siggrou 22',
                'location_lat' => 40.6446290,
                'location_long' => 22.940921,
                'description_short' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.' ,
                'description_long' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt quos ipsam distinctio repudiandae nobis? Rerum corporis consequuntur sapiente sed? Labore minus eaque consequuntur inventore vel mollitia placeat officia facere dolores, doloremque dolor cupiditate ipsum modi soluta itaque veritatis voluptatem necessitatibus tempore eligendi maxime tempora facilis! Porro accusantium reiciendis dolore id?',
                'parking' => 0,
                'wifi' => 1,
                'pet_friendly' => 0
            ],
            [
                'name' => 'Airotel Galaxy Hotel',
                'type_id' => 2,
                'city' => 'Kavala',
                'area'=> 'Kentro',
                'photo_url' => 'room-7.jpg',
                'count_of_guests' => 2,
                'price' => 170,
                'address' => 'El. Venizelou 27',
                'location_lat' => 40.9431210,
                'location_long' => 24.4100360,
                'description_short' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.' ,
                'description_long' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt quos ipsam distinctio repudiandae nobis? Rerum corporis consequuntur sapiente sed? Labore minus eaque consequuntur inventore vel mollitia placeat officia facere dolores, doloremque dolor cupiditate ipsum modi soluta itaque veritatis voluptatem necessitatibus tempore eligendi maxime tempora facilis! Porro accusantium reiciendis dolore id?',
                'parking' => 1,
                'wifi' => 1,
                'pet_friendly' => 1
            ],
            [
                'name' => 'Egnatia City Hotel',
                'type_id' => 4,
                'city' => 'Kavala',
                'area'=> 'Kentro',
                'photo_url' => 'room-8.jpg',
                'count_of_guests' => 4,
                'price' => 280,
                'address' => '7is Merarchias 139',
                'location_lat' => 40.9479970,
                'location_long' => 24.3874950,
                'description_short' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.' ,
                'description_long' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt quos ipsam distinctio repudiandae nobis? Rerum corporis consequuntur sapiente sed? Labore minus eaque consequuntur inventore vel mollitia placeat officia facere dolores, doloremque dolor cupiditate ipsum modi soluta itaque veritatis voluptatem necessitatibus tempore eligendi maxime tempora facilis! Porro accusantium reiciendis dolore id?',
                'parking' => 1,
                'wifi' => 1,
                'pet_friendly' => 0
            ],
            [
                'name' => 'Villa Manos Hotel Santorini',
                'type_id' => 2,
                'city' => 'Santorini',
                'area'=> 'Xora',
                'photo_url' => 'room-9.jpg',
                'count_of_guests' => 2,
                'price' => 300,
                'address' => 'Karterados',
                'location_lat' => 36.4131770,
                'location_long' => 25.4478070,
                'description_short' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.' ,
                'description_long' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt quos ipsam distinctio repudiandae nobis? Rerum corporis consequuntur sapiente sed? Labore minus eaque consequuntur inventore vel mollitia placeat officia facere dolores, doloremque dolor cupiditate ipsum modi soluta itaque veritatis voluptatem necessitatibus tempore eligendi maxime tempora facilis! Porro accusantium reiciendis dolore id?',
                'parking' => 0,
                'wifi' => 1,
                'pet_friendly' => 0
            ],
            [
                'name' => 'Volcano View Hotel Santorini',
                'type_id' => 3,
                'city' => 'Santorini',
                'area'=> 'Xora',
                'photo_url' => 'room-10.jpg',
                'count_of_guests' => 3,
                'price' => 410,
                'address' => 'Fira',
                'location_lat' => 36.4006410,
                'location_long' => 25.4377640,
                'description_short' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.' ,
                'description_long' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt quos ipsam distinctio repudiandae nobis? Rerum corporis consequuntur sapiente sed? Labore minus eaque consequuntur inventore vel mollitia placeat officia facere dolores, doloremque dolor cupiditate ipsum modi soluta itaque veritatis voluptatem necessitatibus tempore eligendi maxime tempora facilis! Porro accusantium reiciendis dolore id?',
                'parking' => 0,
                'wifi' => 1,
                'pet_friendly' => 0
            ],
        ];

        foreach ($users as $key => $value) {
            \App\Models\Room::create($value);
        }
    }
}
