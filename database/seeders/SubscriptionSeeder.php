<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubscriptionPlan::where('id', '>', 0)->delete();
        SubscriptionPlan::insert([
            [
                'id' => 1, 
                'name' => 'Basic',
                'limit' => 5,
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'name' => 'Standard',
                'limit' => 10,
                'price' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'name' => 'Professional',
                'limit' => 20,
                'price' => 50,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'name' => 'Business',
                'limit' => 0,
                'price' => 100,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
