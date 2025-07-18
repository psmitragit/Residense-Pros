<?php

namespace Database\Seeders;

use App\Models\StaticPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaticPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StaticPage::where('id', '>', 0)->delete();
        StaticPage::insert([
            [
                'id' => 1,
                'name' => 'Cookie Policy',
                'slug' => 'cookie-policy',
                'status' => 1,
                'content' => 'lorem ipsum doller si',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'name' => 'Privecy Policy',
                'slug' => 'privecy-policy',
                'status' => 1,
                'content' => 'lorem ipsum doller si',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'name' => 'Terms & Condition',
                'slug' => 'terms-and-condition',
                'status' => 1,
                'content' => 'lorem ipsum doller si',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
