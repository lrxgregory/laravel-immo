<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Mail\PropertyContactMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;

class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request)
    {
        // Initialisation de la requête pour les propriétés
        $query = Property::query()->orderBy('created_at', 'desc');

        // Récupération des valeurs des filtres si elles existent
        $price = $request->input('price');
        $surface = $request->input('surface');
        $rooms = $request->input('rooms');

        // Appliquer les filtres seulement si des valeurs sont fournies
        if (!is_null($price)) {
            $query->where('price', '<=', $price); // Filtre pour un budget max
        }
        if (!is_null($surface)) {
            $query->where('surface', '>=', $surface); // Filtre pour une surface min
        }
        if (!is_null($rooms)) {
            $query->where('rooms', '>=', $rooms); // Filtre pour le nombre de pièces min
        }

        // Retourne les propriétés paginées
        return view('property.index', [
            'properties' => $query->paginate(16),
            'input' => $request->all() // Passer les valeurs d'entrée au front-end
        ]);
    }


    public function show(string $slug, Property $property)
    {
        $expectedSlug = $property->getSlug();
        if ($slug !== $expectedSlug) {
            return to_route('property.show', ['slug' => $expectedSlug, 'property' => $property->id]);
        }

        return view('property.show', compact('property'));
    }

    public function contact(Property $property, PropertyContactRequest $request)
    {
        Mail::send(new PropertyContactMail($property, $request->validated()));
        return back()->with('success', 'Votre message a bien été envoyé');
    }
}
