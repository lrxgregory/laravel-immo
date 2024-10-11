<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyImageFactory extends Factory
{
    public function definition(): array
    {
        // Dimensions de l'image
        $width = 640;
        $height = 480;

        // Générer un ID aléatoire pour l'image (Picsum a des IDs entre 1 et ~1000)
        $imageId = $this->faker->numberBetween(1, 1000);

        // Générer l'URL de l'image depuis Picsum
        $imageUrl = "https://picsum.photos/id/{$imageId}/{$width}/{$height}";

        // Retourner l'URL pour l'enregistrement en base de données
        return [
            'path' => $imageUrl, // URL de l'image pour le front
            'property_id' => Property::factory(),
        ];
    }
}
