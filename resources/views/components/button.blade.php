<button
    type="{{ $attributes->get('type', 'submit') }}"
    class="button button--{{ $attributes->get('variant', 'primary') }} {{ $attributes->get('class') }}"
    {{ $attributes->except(['type', 'variant', 'class']) }}
    data-loading-text="Aguarde..."
>
    @if($attributes->has('icon'))
        <span class="button__icon">{{ $attributes->get('icon') }}</span>
    @endif
    {{ $slot }}
</button>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const forms = document.querySelectorAll('form');

        forms.forEach(form => {
            form.addEventListener('submit', function () {
                const buttons = form.querySelectorAll('button[type="submit"]');
                buttons.forEach(button => {
                    button.disabled = true;
                    const loadingText = button.getAttribute('data-loading-text') || 'Carregando...';
                    button.innerHTML = `<span class="button__spinner"></span> ${loadingText}`;
                });
            });
        });
    });
</script>
