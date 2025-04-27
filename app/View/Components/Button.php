<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $variant;
    public $icon;

    public function __construct($type = 'button', $variant = 'primary', $icon = null)
    {
        $this->type = $type;
        $this->variant = $variant;
        $this->icon = $icon;
    }

    public function render()
    {
        return view('components.button');
    }
}
