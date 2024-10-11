@extends('base')

@section('title', $property->title)

@section('content')
    @include('shared.flash')

    <div class="flex-grow p-6">
        <h1 class="text-4xl font-bold mb-2">{{ $property->title }}</h1>
        <h2 class="text-xl text-gray-600 mb-4">{{ $property->rooms }} pièces - {{ $property->surface }} m²</h2>

        <div class="text-2xl font-semibold text-green-600 mb-4">
            {{ number_format($property->price, 0, '.', ' ') }} €
        </div>

        <hr class="my-4 border-gray-300">

        <div class="mt-4 flex flex-wrap">
            <div class="w-full md:w-3/4 pr-4">
                <p class="text-gray-700 mb-4">{!! nl2br(e($property->description)) !!}</p>
            </div>
        </div>

        @if ($property->exists && $property->images->count() > 0)
            <div class="grid grid-cols-4 gap-4">
                @foreach ($property->images as $image)
                    <div class="relative">
                        <img src="{{ Storage::url($image->path) }}" alt="" class=" object-cover rounded">
                    </div>
                @endforeach
            </div>
        @endif
        <div class="mt-4 flex">
            <div class="w-full md:w-2/3 bg-gray-100 p-4 rounded-lg shadow-md mb-4 md:mr-5">
                <h2 class="text-lg font-semibold mb-2">Caractéristiques</h2>
                <table class="w-full">
                    <tbody>
                        <tr class="border-b">
                            <td class="py-2">Surface habitable</td>
                            <td class="py-2 text-right">{{ $property->surface }} m²</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2">Pièces</td>
                            <td class="py-2 text-right">{{ $property->rooms }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2">Etages</td>
                            <td class="py-2 text-right">{{ $property->floors ?: 'Rez-de-chaussée' }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2">Localisation</td>
                            <td class="py-2 text-right">{{ $property->city }}</td>
                    </tbody>
                </table>
            </div>
            <div class="w-full md:w-1/3 bg-gray-100 p-4 rounded-lg shadow-md mb-4 md:mt-0">
                <h2 class="text-lg font-semibold mb-2">Spécificités</h2>
                <ul class="list-disc pl-5">
                    @foreach ($property->options as $option)
                        <li class="text-gray-700">{{ $option->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="mt-8">
            <h4 class="text-lg font-semibold mb-4">{{ __('Interested by this property ?') }}</h4>
            <form action="{{ route('property.contact', $property) }}" method="POST"
                class="bg-white p-6 rounded-lg shadow-md">
                @csrf
                @include('shared.input', ['name' => 'firstname', 'label' => 'Prénom'])
                @include('shared.input', ['name' => 'lastname', 'label' => 'Nom'])
                @include('shared.input', ['name' => 'email', 'label' => 'Email'])
                @include('shared.input', ['name' => 'phone', 'label' => 'Téléphone'])
                @include('shared.input', ['type' => 'textarea', 'name' => 'message', 'label' => 'Message'])
                <button type="submit"
                    class="mt-4 w-full bg-blue-600 text-white font-semibold py-2 rounded hover:bg-blue-700 transition duration-200">Envoyer</button>
            </form>
        </div>
    </div>
@endsection
