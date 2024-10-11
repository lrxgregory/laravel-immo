<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Support\Str;
use App\Models\PropertyImage;
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
            'name' => 'Admin',
            'email' => 'lrxgregory@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => 'admin'
        ]);

        $users = User::factory(10)->create(['role' => 'user']);


        $options = Option::factory(10)->create();

        Property::factory(50)
            ->state(function () use ($users) {
                return [
                    'user_id' => $users->random()->id,
                ];
            })
            ->hasAttached($options->random(3))
            ->afterCreating(function (Property $property) {
                PropertyImage::factory()
                    ->create(['property_id' => $property->id]);
            })
            ->create();
    }
}
