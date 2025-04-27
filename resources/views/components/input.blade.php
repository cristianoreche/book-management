<div class="input">
    @if (!empty($label))
        <label for="{{ $id ?? $name }}" class="input__label">{{ $label }}</label>
    @endif

    <input
        type="{{ $type ?? 'text' }}"
        name="{{ $name }}"
        id="{{ $id ?? $name }}"
        value="{{ old($name, $value ?? '') }}"
        placeholder="{{ $placeholder ?? '' }}"
        class="input__field {{ $class ?? '' }}"
        autocomplete="{{ $autocomplete ?? 'off' }}"
        {{ $attributes }}
    >

    @error($name)
    <small class="input__error">{{ $message }}</small>
    @enderror
</div>
