<div class="bg-white overflow-hidden shadow rounded-lg">
    <div class="aspect-w-16 aspect-h-9 relative">
        @if ($property->images->count() > 0)
            <img src="{{ $property->images->first()->path }}" alt="{{ $property->title }}"
                class="w-full h-48 object-cover">
        @else
            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-400">Pas d'image disponible</span>
            </div>
        @endif
        @if ($property->sold)
            <div class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded-md text-sm font-semibold">
                Vendu
            </div>
        @endif
    </div>
    <div class="p-4">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div class="sm:flex-1 sm:flex sm:items-start sm:justify-between">
                <div class="truncate">
                    <h3 class="text-lg font-medium text-gray-900 inline">
                        <a
                            href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property->id]) }}">
                            {{ $property->title }}
                        </a>
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">{{ $property->surface }}m² - {{ $property->city }}
                        ({{ $property->postal_code }})</p>
                    <p class="mt-1 text-sm text-gray-500 font-semibold">
                        {{ number_format($property->price, 0, '.', ' ') }} €</p>
                </div>
            </div>
        </div>
    </div>
</div>
