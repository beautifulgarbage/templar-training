<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PageHeader extends Composer
{
    protected static $views = [
        'partials.page-header',
    ];

    public function override()
    {
        return [
            'hero' => get_field('hero_content'),
        ];
    }

}
