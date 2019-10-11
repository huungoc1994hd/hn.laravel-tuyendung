<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class Category extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'template' => 'ol',
        'categories' => null
    ];

    /**
     * The number of minutes before cache expires.
     * False means no caching at all.
     *
     * @var int|float|bool
     */
    //public $cacheTime = 60;

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        return view('widgets.category.index', [
            'config' => $this->config,
            'categories' => $this->config['categories']
        ]);
    }
}
