<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Links extends Component
{
    public $linkUrl;
    public $label;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($linkUrl="/",$label)
    {
        $this->linkUrl=$linkUrl;
        $this->label=$label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.links');
    }
}
