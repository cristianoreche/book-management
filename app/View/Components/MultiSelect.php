<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MultiSelect extends Component
{
    public string $name;
    public string $label;
    public array $options;
    public array $selected;
    
    public function __construct(
        string $name,
        string $label,
        array $options = [],
        array $selected = []
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->selected = $selected;
    }

    public function render(): View|Closure|string
    {
        return view('components.multi-select');
    }
}
