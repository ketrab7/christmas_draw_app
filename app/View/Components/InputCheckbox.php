<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputCheckbox extends Component
{
    public $id;
    public $name;
    public $value;
    public $checked;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $name, $value, $checked = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-checkbox');
    }
}
