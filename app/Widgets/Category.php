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
        'name' => null,
        'class' => 'form-control',
        'defaultValue' => 0
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
        $categories = \App\Http\Models\Category::where('parent_id', 0)
            ->with('children')
            ->get();

        return view('widgets.category.index', [
            'config' => $this->config,
            'categories' => $categories,
            'categoriesSelectData' => $this->flattenDown($categories)
        ]);
    }

    /**
     * @param $data
     * @param int $index
     * @param array $elements
     * @return array of select tag data list
     */
    protected function flattenDown($data, $index = 0, &$elements = [])
    {
        $elements[0] = ':root';

        foreach($data as $e) {
            $elements[$e->id] = str_repeat('---', $index) . $e->name;

            if (!empty($e->children)) {
                $elements = $this->flattenDown($e->children, $index+1, $elements);
            }
        }

        return $elements;
    }
}
