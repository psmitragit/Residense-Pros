<?php

namespace Database\Seeders;

use App\Models\AdsPosition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdsPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdsPosition::truncate();
        AdsPosition::insert([
            [
                'id' => 1,
                'name' => 'Home Page Before Featured Properties',
                'price' => 1
            ],
            [
                'id' => 2,
                'name' => 'Home Page Before Blogs',
                'price' => 1
            ],
            [
                'id' => 3,
                'name' => 'Property Listing Page',
                'price' => 1
            ],
            [
                'id' => 4,
                'name' => 'FAQ Page First Ad',
                'price' => 1
            ],
            [
                'id' => 5,
                'name' => 'FAQ Page Second Ad',
                'price' => 1
            ],
            [
                'id' => 6,
                'name' => 'Blog Page Inside Blogs',
                'price' => 1
            ],
            [
                'id' => 7,
                'name' => 'Blog Page After Recent Post',
                'price' => 1
            ],
            [
                'id' => 8,
                'name' => 'Contact Us Page',
                'price' => 1
            ]
        ]);
    }
}
