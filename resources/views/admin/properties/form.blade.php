@extends('admin.admin')

@section('title', 'Ajouter un bien')

@section('content')
    <div class="flex justify-around items-center">
        <h1 class="text-center text-3xl font-bold my-6">@yield('title')</h1>
        <a href="{{ route('admin.property.index') }}" class="text-blue-600 hover:text-blue-800">Retour</a>
    </div>

    <div class="w-6/12 mx-auto">
        <form
            action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', ['property' => $property]) }}"
            method="POST">
            @csrf
            @method($property->exists ? 'PUT' : 'POST')

            <div class="flex justify-between">
                @include('shared.input', [
                    'label' => 'Titre',
                    'name' => 'title',
                    'value' => $property->title,
                ])

                @include('shared.input', [
                    'label' => 'Surface',
                    'name' => 'surface',
                    'value' => $property->surface,
                ])

                @include('shared.input', [
                    'label' => 'Prix',
                    'name' => 'price',
                    'value' => $property->price,
                ])
            </div>

            <div class="flex flex-col">
                @include('shared.input', [
                    'label' => 'Description',
                    'name' => 'description',
                    'value' => $property->description,
                    'type' => 'textarea',
                ])
            </div>

            <div class="flex justify-between">
                @include('shared.input', [
                    'label' => 'Pièces',
                    'name' => 'rooms',
                    'value' => $property->rooms,
                ])

                @include('shared.input', [
                    'label' => 'Chambres',
                    'name' => 'bedrooms',
                    'value' => $property->bedrooms,
                ])

                @include('shared.input', [
                    'label' => 'Etage',
                    'name' => 'floors',
                    'value' => $property->floors,
                ])
            </div>

            <div class="flex justify-between">
                @include('shared.input', [
                    'label' => 'Adresse',
                    'name' => 'address',
                    'value' => $property->address,
                ])

                @include('shared.input', [
                    'label' => 'Ville',
                    'name' => 'city',
                    'value' => $property->city,
                ])

                @include('shared.input', [
                    'label' => 'Code postal',
                    'name' => 'postal_code',
                    'value' => $property->postal_code,
                ])
            </div>

            @include('shared.checkbox', [
                'label' => 'Vendu',
                'name' => 'sold ',
                'value' => $property->sold,
            ])

            <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">
                @if ($property->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </form>
    </div>
@endsection
