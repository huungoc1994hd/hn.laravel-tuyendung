<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Http\Models\Category as CategoryModel;

class Category extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'template' => 'ol'
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
        $categories = CategoryModel::where('parent_id', 0)->get();

        return view('widgets.category.index', [
            'categories' => $categories,
            'config' => $this->config
        ]);
    }
}
