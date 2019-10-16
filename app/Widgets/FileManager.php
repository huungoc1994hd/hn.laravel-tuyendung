<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class FileManager extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'data-upload' => 'image',
        'name' => 'image',
        'data-input' => 'image',
        'value' => null,
        'data-rule-required' => 'false',
        'data-msg-required' => null,
        'browse' => 'Browse...'
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
        return view('widgets.file_manager', [
            'config' => $this->config,
        ]);
    }
}
