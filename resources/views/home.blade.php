@extends('base')

@section('content')
    <div class="flex-grow">
        <h1 class="text-4xl text-center">Bienvenue sur Immo Admin</h1>
        <h2 class="text-2xl">Voici les {{ $properties->count() }} derniers biens créés.</h2>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($properties as $property)
                @include('property.card', ['property' => $property])
            @endforeach
        </div>
    </div>
@endsection
