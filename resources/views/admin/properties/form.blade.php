@extends('admin.admin')

@section('title', $property->exists ? 'Modifier le bien' : 'Créer un bien')

@section('content')
    <div class="flex justify-around items-center">
        <h1 class="text-center text-3xl font-bold my-6">
            {{ $property->exists ? 'Modifier le bien' : 'Créer un bien' }}
        </h1>
        <a href="{{ route('admin.property.index') }}"
            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">Retour</a>
    </div>

    <div class="w-8/12 mx-auto bg-white rounded-lg shadow-lg p-6">
        <form
            action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', ['property' => $property]) }}"
            method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method($property->exists ? 'PUT' : 'POST')

            <div class="grid grid-cols-3 gap-4">
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

            <div>
                @include('shared.input', [
                    'label' => 'Description',
                    'name' => 'description',
                    'value' => $property->description,
                    'type' => 'textarea',
                ])
            </div>

            <div class="grid grid-cols-3 gap-4">
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

            <div class="grid grid-cols-3 gap-4">
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

            <div>
                @include('shared.input', [
                    'label' => 'Images',
                    'type' => 'file',
                    'name' => 'images[]',
                    'multiple' => true,
                    'accept' => 'image/*',
                ])

                @if ($property->exists && $property->images->count() > 0)
                    <div class="grid grid-cols-4 gap-4">
                        @foreach ($property->images as $image)
                            <div class="relative">
                                <img src="{{ Storage::url($image->path) }}" alt=""
                                    class="w-full h-32 object-cover rounded">
                                <label class="absolute top-0 right-0 p-1">
                                    <input type="checkbox" name="deleted_images[]" value="{{ $image->id }}">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>

                                </label>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>

            <div>
                @include('shared.checkbox', [
                    'label' => 'Vendu',
                    'name' => 'sold',
                    'value' => $property->sold,
                ])
            </div>

            <div>
                @include('shared.select', [
                    'label' => 'Options',
                    'name' => 'options',
                    'value' => $property->options()->pluck('id'),
                    'options' => $options,
                ])
            </div>

            <div class="flex items-center justify-end space-x-3 pt-4">
                <a href="{{ route('admin.property.index') }}"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                    Annuler
                </a>
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                    {{ $property->exists ? 'Modifier' : 'Créer' }}
                </button>
            </div>
        </form>
    </div>
@endsection
