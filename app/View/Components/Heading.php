<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Heading extends Component
{
    public $headingName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($headingName="faltu")
    {
        $this->headingName=$headingName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.heading');
    }
}
