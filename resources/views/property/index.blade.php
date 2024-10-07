@extends('base')

@section('title', 'Tous nos biens')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <form action="" method="GET" class="">
            <input type="number" name="surface" placeholder="Surface min" value="{{ $input['surface'] ?? '' }}">
            <input type="number" name="rooms" placeholder="Nombre de pièces min" value="{{ $input['rooms'] ?? '' }}">
            <input type="number" name="price" placeholder="Budget max" value="{{ $input['price'] ?? '' }}">
            <button>Filtrer</button>
        </form>
    </div>

    <div class="flex-grow">
        <h1 class="text-4xl text-center mb-4">Bienvenue sur Immo Laravel</h1>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($properties as $property)
                @include('property.card', ['property' => $property])
            @empty
                <div>Aucun bien ne correspond à vorte recherche</div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $properties->links() }}
        </div>
    </div>
@endsection
