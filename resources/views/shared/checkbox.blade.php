@php
    $label = $label ?? ucfirst($name);
    $name = $name ?? '';
    $value = $value ?? '';
    $type = $type ?? 'text';
    $placeholder = $placeholder ?? '';
    $required = $required ?? false;
@endphp

<div class="mb-4 flex items-center">
    <input type="hidden" name={{ $name }} value="0">
    <input @checked(old($name, $value ?? false)) type="checkbox" name={{ $name }} id={{ $name }} role="switch"
        value="1" @if ($value) checked @endif
        class="mr-2 @error($name) border-red-500 @enderror">

    <label for={{ $name }} class="text-gray-700 text-sm font-medium">
        {{ $label }}
    </label>

    @error($name)
        <p class="text-red-500 text-sm mt-1 ml-6">{{ $message }}</p>
    @enderror
</div>
