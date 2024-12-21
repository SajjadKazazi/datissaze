<?php

namespace App\View\Components\front\partials\pages;

use Illuminate\View\Component;

class header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $description;
    public $pic;

    public function __construct($title , $description , $pic = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->pic = $pic;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.front.partials.pages.header');
    }
}
