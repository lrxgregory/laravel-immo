@extends('admin.admin')

@section('title', $option->exists ? 'Modifier l\'option' : 'Créer une option')

@section('content')
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">
                    {{ $option->exists ? 'Modifier l\'option' : 'Créer une option' }}
                </h1>
                <a href="{{ route('admin.option.index') }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                    Retour à la liste
                </a>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6">
                <form
                    action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', ['option' => $option]) }}"
                    method="POST" class="space-y-6">
                    @csrf
                    @method($option->exists ? 'PUT' : 'POST')

                    <div class="space-y-4">
                        @include('shared.input', [
                            'label' => 'Nom de l\'option',
                            'name' => 'name',
                            'value' => $option->name,
                            'placeholder' => 'Entrez le nom de l\'option',
                            'required' => true,
                        ])
                    </div>

                    <div class="flex items-center justify-end space-x-3 pt-4">
                        <a href="{{ route('admin.option.index') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                            Annuler
                        </a>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            {{ $option->exists ? 'Modifier l\'option' : 'Créer l\'option' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
