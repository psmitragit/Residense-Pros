<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'democoder999@yopmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'status' => 'active'
        ]);

        $this->call(CountrySeeder::class);
        $this->call(OptionSeeder::class);
        $this->call(EmailTemplateSeeder::class);
        $this->call(SubscriptionSeeder::class);
    }
}
