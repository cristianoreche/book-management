<div class="search">
    <div class="search__wrapper">
        <input
            type="text"
            name="{{ $name }}"
            id="{{ $id ?? $name }}"
            value="{{ old($name, $value ?? '') }}"
            placeholder="{{ $placeholder ?? '' }}"
            class="search__input {{ $class ?? '' }}"
            autocomplete="off"
            {{ $attributes }}
        >
        <div class="search__results"></div>
    </div>
</div>
