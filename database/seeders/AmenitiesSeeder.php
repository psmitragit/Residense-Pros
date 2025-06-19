<?php

namespace Database\Seeders;

use App\Models\Amenity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AmenitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Amenity::where('id', '>', 0)->delete();
        $data = [
            ['name' => 'Parking'],
            ['name' => 'Moduler Kitchen'],
            ['name' => 'False Celling With Led'],
            ['name' => 'Air Conditioning'],
            ['name' => 'Dishwasher'],
            ['name' => 'Balcony / Terrace'],
            ['name' => 'High-speed Internet'],
            ['name' => 'Utility laundry Room'],
            ['name' => 'Private Garden'],
            ['name' => 'WiFi Connection'],
            ['name' => 'Storage Space / Attic'],
            ['name' => 'Home office / Study'],
            ['name' => 'CCTV surveilance'],
            ['name' => 'Fire alarm system'],
            ['name' => 'Digital locks'],
            ['name' => 'Outdoor space'],
            ['name' => 'Conference hall'],
            ['name' => 'Ample parking'],
            ['name' => 'Restrooms'],
            ['name' => 'Media Rooms'],
        ];
        $newData = [];
        foreach ($data as $key => $value) {
            $newData[] = [
                'id' => $key + 1,
                'name' => $value['name']
            ];
        }
        Amenity::insert($newData);
    }
}
