<?php

namespace App\Http\Resources;

use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'surface' => $this->surface,
            'rooms' => $this->rooms,
            'floors' => $this->floors,
            'city' => $this->city,
            'description' => $this->description,
            'options' => OptionResource::collection($this->whenLoaded('options')),
        ];
    }
}
