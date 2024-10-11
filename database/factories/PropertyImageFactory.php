<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyImageFactory extends Factory
{
    public function definition(): array
    {
        $width = 640;
        $height = 480;

        $imageId = $this->faker->numberBetween(1, 700);

        $imageUrl = "https://picsum.photos/id/{$imageId}/{$width}/{$height}";

        return [
            'path' => $imageUrl,
            'property_id' => Property::factory(),
        ];
    }
}
