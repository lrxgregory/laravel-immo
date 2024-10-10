<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Option;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        user::create([
            'name' => 'Admin',
            'email' => 'lrxgregory@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        User::factory(10)->create();
        $options = Option::factory(10)->create();
        Property::factory(50)
            ->hasAttached($options->random(3))
            ->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
