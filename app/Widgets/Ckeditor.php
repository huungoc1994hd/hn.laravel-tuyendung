<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class Ckeditor extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'entities-latin' => false,
        'language' => 'vi',
        'content' => null,
        'color' => '#CDCDCD',
        'height' => 400,
        'type' => 'standard',
        'view-source' => false
    ];

    /**
     * The number of minutes before cache expires.
     * False means no caching at all.
     *
     * @var int|float|bool
     */
    public $cacheTime = 60;

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        return view('widgets.ckeditor', [
            'config' => $this->config,
        ]);
    }
}
