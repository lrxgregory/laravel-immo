<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\PropertyFormRequest;
use Illuminate\Http\Client\Request;

class PropertyController extends Controller
{
    public function index()
    {
        return view('admin.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.properties.form', [
            'property' => new Property(),
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    public function store(PropertyFormRequest $request)
    {
        $validatedData = $request->validated();

        // Créer la propriété
        $property = Property::create($validatedData);

        // Gérer les images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Générer un nom unique pour chaque image
                $imageName = time() . '_' . $image->getClientOriginalName();

                // Sauvegarder l'image
                $path = $image->storeAs('properties', $imageName, 'public');

                // Créer l'entrée dans la base de données
                $property->images()->create([
                    'path' => $path
                ]);
            }
        }

        // Synchroniser les options
        $property->options()->sync($request->validated('options'));

        return to_route('admin.property.index')->with('success', 'Le bien a été créé avec succès');
    }

    public function edit(int $id)
    {
        return view('admin.properties.form', [
            'property' => Property::with('images')->findOrFail($id),
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    public function update(PropertyFormRequest $request, Property $property)
    {
        $validatedData = $request->validated();

        // Mettre à jour les données de la propriété
        $property->update($validatedData);

        // Gérer les nouvelles images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Générer un nom unique pour chaque image
                $imageName = time() . '_' . $image->getClientOriginalName();

                // Sauvegarder l'image
                $path = $image->storeAs('properties', $imageName, 'public');

                // Créer l'entrée dans la base de données
                $property->images()->create([
                    'path' => $path
                ]);
            }
        }

        // Synchroniser les options
        $property->options()->sync($request->validated('options'));

        // Suppression des images existantes si cochées
        if ($request->filled('deleted_images')) {
            $imagesToDelete = $property->images()->whereIn('id', $request->input('deleted_images'))->get();
            foreach ($imagesToDelete as $image) {
                Storage::disk('public')->delete($image->path);
                $image->delete();
            }
        }

        return to_route('admin.property.index')->with('success', 'Le bien a été modifié avec succès');
    }


    public function destroy(Property $property)
    {
        die('ok');
        // Supprimer toutes les images associées
        foreach ($property->images as $image) {
            Storage::disk('public')->delete($image->path);
            $image->delete();
        }

        // Supprimer la propriété
        $property->delete();

        return to_route('admin.property.index')->with('success', 'Le bien a été supprimé avec succès');
    }
}
