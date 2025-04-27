<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $method;
    public $action;

    public function __construct($method = 'POST', $action = '')
    {
        $this->method = $method;
        $this->action = $action;
    }

    public function render()
    {
        return view('components.form');
    }
}
