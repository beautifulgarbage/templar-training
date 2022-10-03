<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PageContent extends Composer
{
    protected static $views = [
        'partials.content-page',
    ];

    public function override()
    {
        $blocks = get_field('blocks');

        return [
            'blocks' => $blocks,
        ];
    }

}
