@extends('base')

@section('title', 'Se connecter')

@section('content')
    <div class="mt-8">
        <h4 class="text-lg font-semibold mb-4">Intéressé par ce bien ?</h4>
        <form action="{{ route('login') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @include('shared.input', ['name' => 'email', 'label' => 'Email'])
            @include('shared.input', [
                'type' => 'password',
                'name' => 'password',
                'label' => 'Mot de passe',
            ])
            <button type="submit"
                class="mt-4 w-full bg-blue-600 text-white font-semibold py-2 rounded hover:bg-blue-700 transition duration-200">Envoyer</button>
        </form>
    </div>
@endsection
