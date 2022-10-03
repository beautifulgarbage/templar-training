<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Alert extends Component
{
    /**
     * The alert type.
     *
     * @var string
     */
    public $type;

    /**
     * The alert message.
     *
     * @var string
     */
    public $message;

    /**
     * Create the component instance.
     *
     * @param  string  $link
     * @param  boolean $inverse
     * @param  string  $message
     * @return void
     */
    public function __construct($href = '#', $inverse = false, $message = null)
    {
        $this->href = $href;
        $this->message = $message;
        $this->inverse = $inverse;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.cta');
    }
}
