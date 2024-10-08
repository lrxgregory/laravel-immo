@php
    $label = $label ?? ucfrist(name);
    $name = $name ?? '';
    $value = $value ?? '';
    $type = $type ?? 'text';
    $placeholder = $placeholder ?? '';
    $required = $required ?? false;
    $multiple = $multiple ?? false;
@endphp

<div class="mb-4">
    <label for="{{ $name }}" class="block text-gray-700 text-sm font-medium mb-2">
        {{ $label }}
    </label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}" @if ($required) required @endif
        @if ($multiple) multiple @endif
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error($name) border-red-500 @enderror">
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
