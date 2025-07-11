<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Option::truncate();
        Option::insert(
            [
                [
                    'key'  =>  'site_title',
                    'value' => 'Residence Pros'
                ],
                [
                    'key' => 'phone',
                    'value' => '+1 012 345 6789'
                ],
                [
                    'key' => 'email',
                    'value' => 'abc@emailid.com'
                ],
                [
                    'key' => 'facebook',
                    'value' => 'https://www.facebook.com/testing-web'
                ],
                [
                    'key' => 'instagram',
                    'value' => 'https://www.instagram.com/testing-web'
                ],
                [
                    'key' => 'linkedin',
                    'value' => 'https://www.linkedin.com/testing-web'
                ],
                [
                    'key' => 'notification_email',
                    'value' => 'democoder999@yopmail.com'
                ],
                [
                    'key' => 'admin_perpage',
                    'value' => '10'
                ],
                [
                    'key' => 'frontend_perpage',
                    'value' => '10'
                ],
                [
                    'key' => 'homepage_title',
                    'value' => 'Find Your Best Residence'
                ],
                [
                    'key' => 'homepage_description',
                    'value' => 'Discover your perfect home, thoughtfully designed and tailored to match your lifestyle, comfort, and aspirations for modern living.'
                ]
            ]
        );
    }
}
