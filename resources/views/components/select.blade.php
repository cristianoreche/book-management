@if (!empty($label))
    <label for="{{ $id ?? $name }}" class="input__label">{{ $label }}</label>
@endif

<select
    id="{{ $id ?? $name }}"
    name="{{ $name }}{{ !empty($multiple) ? '[]' : '' }}"
    @if (!empty($multiple)) multiple @endif
    @if (!empty($disabled)) disabled @endif
    class="input__field {{ $class ?? '' }}"
    {{ $attributes }}
>
    @if (empty($multiple))
        <option value="">Selecione</option>
    @endif

    @foreach ($options as $optionValue => $optionLabel)
        <option value="{{ $optionValue }}"
        @if (is_array(old($name, $selected ?? [])))
            {{ in_array($optionValue, old($name, $selected ?? [])) ? 'selected' : '' }}
            @else
            {{ old($name, $selected ?? '') == $optionValue ? 'selected' : '' }}
            @endif
        >
            {{ $optionLabel }}
        </option>
    @endforeach
</select>

@error($name)
<small class="input__error">{{ $message }}</small>
@enderror
