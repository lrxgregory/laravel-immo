<div class="bg-white overflow-hidden shadow rounded-lg">
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
                    @if ($property->sold)
                        <p class="ml-2 inline mt-1 text-sm text-gray-500 font-bold">Vendu</p>
                    @endif
                    <p class="mt-1 text-sm text-gray-500">{{ $property->surface }}m² - {{ $property->city }}
                        ({{ $property->postal_code }})</p>
                    <p class="mt-1 text-sm text-gray-500">{{ number_format($property->price, 0, '.', ' ') }} €</p>
                </div>
            </div>
        </div>
    </div>
</div>
