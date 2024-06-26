<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Master extends Component
{
    /**
     * @var string
     */
    public $title;

    public function __construct($title = '')
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('admin.components.master');
    }
}
