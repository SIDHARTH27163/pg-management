<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Admin\Models\Room;
use Modules\Admin\Models\RoomImage;
use Modules\Admin\Models\RoomFeature;
use Modules\Admin\Models\RoomRule;
use Modules\Admin\Models\RoomsGallery;
class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Define feature and rule options
        $featureOptions = ['Wi-Fi', 'Air Conditioning', 'TV', 'Laundry Service', 'Gym Access', 'Swimming Pool', 'Parking'];
        $ruleOptions = ['No Smoking', 'No Pets Allowed', 'Keep Noise to a Minimum', 'No Overnight Guests', 'Maintain Cleanliness'];
    
        // Seed 20 rooms
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
                'additional_charges' => "
                    <h3>Additional Charges</h3>
                    <ul>
                        <li>Security Deposit: " . rand(1000, 2000) . " USD</li>
                        <li>Maintenance Fee: " . rand(100, 300) . " USD</li>
                        <li>Cleaning Fee: " . rand(50, 150) . " USD</li>
                    </ul>
                    <p>All additional charges are subject to terms and conditions.</p>
                ",
                'description' => "
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    &lt;h3&gt;Additional Charges&lt;/h3&gt;
                    &lt;ul&gt;
                        &lt;li&gt;Security Deposit: 1904 USD&lt;/li&gt;
                        &lt;li&gt;Maintenance Fee: 110 USD&lt;/li&gt;
                        &lt;li&gt;Cleaning Fee: 96 USD&lt;/li&gt;
                    &lt;/ul&gt;
                    &lt;p&gt;All additional charges are subject to terms and conditions.&lt;/p&gt;
                
                  </p>
                ",
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
    
            // Create 5 features for the room
            foreach (array_rand($featureOptions, 5) as $featureIndex) {
                RoomFeature::create([
                    'room_id' => $room->id,
                    'feature' => $featureOptions[$featureIndex],
                ]);
            }
    
            // Create 5 rules for the room
            foreach (array_rand($ruleOptions, 5) as $ruleIndex) {
                RoomRule::create([
                    'room_id' => $room->id,
                    'rule' => $ruleOptions[$ruleIndex],
                ]);
            }
        }
    }
    
}
