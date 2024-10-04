<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use App\Models\Property;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.properties.form', [
            'property' => new Property(),
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        $property = Property::create($request->validated());
        $property->options()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success', 'Le bien a été créé avec succès');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return view('admin.properties.form', [
            'property' => Property::findOrFail($id),
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->update($request->validated());
        $property->options()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success', 'Le bien a été modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return to_route('admin.property.index')->with('success', 'Le bien a été supprimé avec succès');
    }
}
