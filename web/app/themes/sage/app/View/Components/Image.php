<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Image extends Component
{
    /**
     * The source url of the image.
     *
     * @var string
     */
    public $src;

    /**
     * Copy of the source url for picture set
     *
     * @var string
     */
    public $srcset;

    /**
     * The class list.
     *
     * @var string
     */
    public $class;

    /**
     * The alternate text for accessibility
     *
     * @var string
     */
    public $alt;

    /**
     * The glide preset (excluding high DPI variants)
     *
     * @var string
     */
    public $preset;

    /**
     * The image width
     *
     * @var string
     */
    public $width;

    /**
     * The image height
     *
     * @var string
     */
    public $height;

    /**
     * Create the component instance.
     *
     * @param  string  $src
     * @param  string  $class
     * @param  string  $alt
     * @param  string  $preset
     * @param  string  $width
     * @param  string  $height
     * @return void
     */
    public function __construct($src = '', $class = '', $alt = '', $preset = '', $width = '', $height = '')
    {
        $this->src = $src;
        $this->srcset = $src;
        $this->class = $class;
        $this->alt = $alt;
        $this->preset = $preset;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.image');
    }
}
