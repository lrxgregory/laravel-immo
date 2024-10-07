<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Http\Requests\SearchPropertiesRequest;

class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request)
    {
        $query = Property::query()->orderBy('created_at', 'desc');
        if ($request->validated('price')) {
            $query->where('price', '>=', $request->validated('price'));
        }
        if ($request->validated('surface')) {
            $query->where('surface', '>=', $request->validated('surface'));
        }
        if ($request->validated('rooms')) {
            $query->where('rooms', '>=', $request->validated('rooms'));
        }
        return view('property.index', ['properties' => $query->paginate(16)]);
    }

    public function show(string $slug, Property $property)
    {
        $expectedSlug = $property->getSlug();
        if ($slug !== $expectedSlug) {
            return to_route('property.show', ['slug' => $expectedSlug, 'property' => $property->id]);
        }

        return view('property.show', compact('property'));
    }
}
