<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Blocks extends Composer
{
    protected static $views = [
        'blocks.*',
    ];

    public function with()
    {
        $fields = get_fields();

        return $fields;
    }

}
