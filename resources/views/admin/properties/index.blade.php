@extends('admin.admin')

@section('title', 'Liste des biens')

@section('content')
    <div class="flex justify-around items-center">
        <h1 class="text-center text-3xl font-bold my-6">@yield('title')</h1>
        <a href="{{ route('admin.property.create') }}" class="text-blue-600 hover:text-blue-800">Ajouter un bien</a>
    </div>


    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border-collapse border border-gray-200 shadow-lg">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 text-center text-gray-600 font-semibold">Titre</th>
                    <th class="px-4 py-2 text-center text-gray-600 font-semibold">Surface</th>
                    <th class="px-4 py-2 text-center text-gray-600 font-semibold">Prix</th>
                    <th class="px-4 py-2 text-center text-gray-600 font-semibold">Ville</th>
                    <th class="px-4 py-2 text-center text-gray-600 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($properties as $property)
                    <tr class="text-center bg-white border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $property->title }}</td>
                        <td class="px-4 py-2">{{ $property->surface }} m²</td>
                        <td class="px-4 py-2">{{ number_format($property->price, 0, '.', ' ') }} €</td>
                        <td class="px-4 py-2">{{ $property->city }}</td>
                        <td class="px-4 py-2 flex justify-center gap-2">
                            <a href="{{ route('admin.property.edit', $property) }}"
                                class="text-blue-600 hover:text-blue-800">Editer</a>
                            <form action={{ route('admin.property.destroy', $property) }} method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $properties->links() }}
    </div>
