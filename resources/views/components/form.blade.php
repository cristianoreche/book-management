<form
    method="{{ strtoupper($method) }}"
    action="{{ $action }}"
    {{ $attributes->merge(['class' => 'form']) }}
>
    @csrf
    @if (in_array(strtoupper($method), ['PUT', 'PATCH', 'DELETE']))
        @method($method)
    @endif

    <div class="form__body">
        {{ $slot }}
    </div>

    @if (isset($buttons))
        <div class="form__actions">
            {{ $buttons }}
        </div>
    @endif
</form>
