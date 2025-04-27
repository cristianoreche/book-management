<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $columns;
    public $items;
    public $actions;

    public function __construct(array $columns, $items, bool $actions = false)
    {
        $this->columns = $columns;
        $this->items = $items;
        $this->actions = $actions;
    }

    public function render()
    {
        return view('components.table');
    }
}
