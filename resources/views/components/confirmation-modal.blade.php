<div class="modal" id="confirmationModal-{{ $itemId ?? 'generic' }}" tabindex="-1" role="dialog">
    <div class="modal__overlay" data-dismiss="modal"></div>
    <div class="modal__container">
        <div class="modal__header">
            <h3 class="modal__title">{{ $title }}</h3>
            <button class="modal__close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal__body">
            <p>{{ $message }}</p>
        </div>
        <div class="modal__footer">
            <button class="button button--secondary" data-dismiss="modal">{{ $cancelText }}</button>
            <button class="button button--danger" onclick="document.getElementById('{{ $formId }}').submit()">
                {{ $confirmText }}
            </button>
        </div>
    </div>
</div>

