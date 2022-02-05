<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableHeader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $direction,
        public string $name,
        public string $field,
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table-header', [
            'visible' => $this->field == $this->name
        ]);
    }
}
