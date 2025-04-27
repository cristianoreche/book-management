<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public $label;
    public $name;
    public $options;
    public $selected;
    public $disabled;

    public function __construct($label = '', $name, $options = [], $selected = null, $disabled = false)
    {
        $this->label = $label;
        $this->name = $name;
        $this->options = $options;
        $this->selected = $selected;
        $this->disabled = $disabled;
    }

    public function render()
    {
        return view('components.select');
    }
}
