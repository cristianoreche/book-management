@if (!empty($label))
    <label for="{{ $name }}" class="input__label">{{ $label }}</label>
@endif

<div id="tags-{{ $name }}" class="tags-selected">
    @foreach ($selected as $id)
        @php
            $selectedText = $options[$id] ?? null;
        @endphp
        @if ($selectedText)
            <span class="tag" data-id="{{ $id }}">
                {{ $selectedText }}
                <button type="button" onclick="removeTag{{ ucfirst($name) }}(this)">x</button>
            </span>
        @endif
    @endforeach
</div>

<select id="select-{{ $name }}" class="input__field" onchange="addTag{{ ucfirst($name) }}()" {{ $attributes }}>
    <option value="">Selecione</option>
    @foreach ($options as $value => $text)
        <option value="{{ $value }}">{{ $text }}</option>
    @endforeach
</select>

<input type="hidden" name="{{ $name }}[]" id="input-{{ $name }}" value="{{ implode(',', $selected) }}" />

@error($name)
<small class="input__error">{{ $message }}</small>
@enderror

<script>
    function addTag{{ ucfirst($name) }}() {
        const select = document.getElementById('select-{{ $name }}');
        const selectedId = select.value;
        const selectedText = select.options[select.selectedIndex].text;
        if (!selectedId) return;

        const tagsContainer = document.getElementById('tags-{{ $name }}');
        if (tagsContainer.querySelector('[data-id="' + selectedId + '"]')) return;

        const span = document.createElement('span');
        span.className = 'tag';
        span.setAttribute('data-id', selectedId);
        span.innerHTML = selectedText + ' <button type="button" onclick="removeTag{{ ucfirst($name) }}(this)">x</button>';
        tagsContainer.appendChild(span);

        updateInput{{ ucfirst($name) }}();
    }

    function removeTag{{ ucfirst($name) }}(btn) {
        btn.parentElement.remove();
        updateInput{{ ucfirst($name) }}();
    }

    function updateInput{{ ucfirst($name) }}() {
        const input = document.getElementById('input-{{ $name }}');
        const tags = document.querySelectorAll('#tags-{{ $name }} .tag');
        const ids = Array.from(tags).map(tag => tag.getAttribute('data-id'));
        input.value = ids.join(',');
    }
</script>
