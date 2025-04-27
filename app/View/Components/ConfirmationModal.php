<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ConfirmationModal extends Component
{
    public $title;
    public $message;
    public $confirmText;
    public $cancelText;
    public $formId;
    public $itemId;

    public function __construct(
        $title = 'Confirmar Exclusão',
        $message = 'Tem certeza que deseja excluir este item?',
        $confirmText = 'Excluir',
        $cancelText = 'Cancelar',
        $formId = 'delete-form',
        $itemId = null
    ) {
        $this->title = $title;
        $this->message = $message;
        $this->confirmText = $confirmText;
        $this->cancelText = $cancelText;
        $this->formId = $formId;
        $this->itemId = $itemId;
    }

    public function render()
    {
        return view('components.confirmation-modal');
    }
}
