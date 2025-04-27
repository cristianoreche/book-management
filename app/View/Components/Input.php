<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $type;
    public $label;
    public $placeholder;
    public $value;
    public $class;
    public $id;
    public $autocomplete;

    public function __construct($name, $type = 'text', $label = null, $placeholder = null, $value = null, $class = null, $id = null, $autocomplete = null)
    {
        $this->name = $name;
        $this->type = $type;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->class = $class;
        $this->id = $id;
        $this->autocomplete = $autocomplete;
    }

    public function render()
    {
        return view('components.input');
    }
}
