@php
    $label = $label ?? ucfrist(name);
    $name = $name ?? '';
    $value = $value ?? '';
    $required = $required ?? false;
@endphp

<div class="mb-4">
    <label for="{{ $name }}" class="block text-gray-700 text-sm font-medium mb-2">
        {{ $label }}
    </label>
    <select name="{{ $name }}[]" multiple id="{{ $name }}"
        @if ($required) required @endif
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error($name) border-red-500 @enderror">
        @foreach ($options as $k => $v)
            <option @selected($value->contains($k)) value="{{ $k }}">{{ $v }}
        @endforeach
    </select>
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
