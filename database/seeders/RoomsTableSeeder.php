<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Admin\Models\Room;
use Modules\Admin\Models\RoomImage;
use Modules\Admin\Models\RoomsGallery;
class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seed 10 rooms
        for ($i = 1; $i <= 20; $i++) {
            // Create a room
            $room = Room::create([
                'status' => 'active',
                'room_type' => ['Single', 'Double', 'Sharing'][array_rand(['Single', 'Double', 'Sharing'])],
                'number_of_tenants' => rand(1, 4),
                'bathroom' => rand(1, 2),
                'balconies' => rand(0, 1),
                'capacity' => rand(1, 5),
                'availability' => rand(0, 1) ? '1' : '0',
                'rent' => rand(1000, 5000),
                'additional_charges' => rand(200, 1000),
                'description' => 'Room description for room ' . $i,
            ]);

            // Create a cover image for the room
            RoomImage::create([
                'room_id' => $room->id,
                'cover_image_path' => 'https://res.cloudinary.com/drm13imxj/image/upload/v1736700750/room_images/gallery/wfku47ey0atvxoqxwrdg.jpg',
            ]);

            // Create 3 gallery images for the room
            for ($j = 1; $j <= 3; $j++) {
                RoomsGallery::create([
                    'room_id' => $room->id,
                    'gallery_image_path' => 'https://res.cloudinary.com/drm13imxj/image/upload/v1736700750/room_images/gallery/wfku47ey0atvxoqxwrdg.jpg',
                ]);
            }
        }
    }
}
